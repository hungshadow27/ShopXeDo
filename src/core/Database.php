<?php

trait Database
{
    protected $conn = null;
    protected $table = '';
    protected $statement = '';

    protected $limit = 15;
    protected $offset = 0;

    protected $host = '';
    protected $user = '';
    protected $pass = '';
    protected $name = '';

    public function __construct()
    {
        $this->host = DBHOST;
        $this->user = DBUSER;
        $this->pass = DBPASS;
        $this->name = DBNAME;
        $this->connect();
    }
    // public function __destruct()
    // {
    //     $this->conn->close();
    // }
    protected function connect()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);
        if ($this->conn->connect_errno) {
            exit($this->conn->connect_error);
        }
        $this->conn->set_charset("utf8");
    }
    public function table($tableName)
    {
        $this->table = $tableName;
        return $this;
    }
    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }
    public function offset($offset)
    {
        $this->offset = $offset;
        return $this;
    }
    public function resetQuery()
    {
        $this->table = '';
        $this->limit = 15;
        $this->offset = 0;
    }

    public function getListItemsWithCondition($conditions)
    {
        $this->connect();

        // Xây dựng câu lệnh WHERE từ mảng conditions
        $whereClauses = [];
        foreach ($conditions as $field => $value) {
            // Sử dụng prepared statements để tránh SQL injection
            $whereClauses[] = "$field = ?";
        }
        $whereClause = implode(' AND ', $whereClauses);

        $sql = "SELECT * FROM $this->table WHERE " . $whereClause;
        $sql .= " LIMIT $this->limit OFFSET $this->offset";

        // Chuẩn bị statement
        $stmt = $this->conn->prepare($sql);

        if ($stmt) {
            // Bind parameters
            $values = array_values($conditions);
            $types = str_repeat('s', count($values)); // Giả sử tất cả là string, có thể điều chỉnh theo nhu cầu
            $stmt->bind_param($types, ...$values);

            // Thực thi query
            $stmt->execute();
            $result = $stmt->get_result();

            $this->resetQuery();

            $returnData = array();
            while ($row = $result->fetch_object()) {
                $returnData[] = $row;
            }

            $stmt->close();
            $this->conn->close();
            return $returnData;
        } else {
            $this->conn->close();
            die("Error preparing SQL query: " . $this->conn->error);
        }
    }


    public function getAll()
    {
        $this->connect();
        $sql = "SELECT * FROM $this->table LIMIT ? OFFSET ?";
        $this->statement = $this->conn->prepare($sql);
        $this->statement->bind_param('ss', $this->limit, $this->offset);
        $this->statement->execute();
        $this->resetQuery();

        $result = $this->statement->get_result();
        $returnData = [];
        while ($row = $result->fetch_object()) {
            $returnData[] = $row;
        }
        $this->conn->close();
        return $returnData;
    }
    public function getOne($fields, $value)
    {
        $this->connect();
        $sql = "SELECT * FROM $this->table WHERE $fields = '$value'";
        $result = $this->conn->query($sql);
        $this->resetQuery();

        if ($result) {
            $returnData = $result->fetch_object();
            return $returnData;
        } else {
            // Handle the case where the query fails
            die("Error in SQL query: " . $this->conn->error);
        }
        $this->conn->close();
    }
    public function insert($data = [])
    {
        $this->connect();
        $fields = implode(',', array_keys($data));
        $valueStr = implode(',', array_fill(0, count($data), '?'));
        $values = array_values($data);
        $sql = "INSERT INTO $this->table($fields) VALUES($valueStr)";
        $this->statement = $this->conn->prepare($sql);
        $this->statement->bind_param(str_repeat('s', count($data)), ...$values);
        $this->statement->execute();
        $this->resetQuery();

        return $this->statement->affected_rows;
    }
    public function insertMultiple($dataArray = [])
    {
        $this->connect();

        if (empty($dataArray)) {
            return 0; // Return 0 affected rows if there's nothing to insert
        }

        $fields = implode(',', array_keys($dataArray[0])); // Assuming all arrays have the same keys

        $valueSets = [];
        $values = [];
        foreach ($dataArray as $data) {
            $valueStr = implode(',', array_fill(0, count($data), '?'));
            $valueSets[] = "($valueStr)";
            $values = array_merge($values, array_values($data));
        }

        $valueSetsStr = implode(',', $valueSets);

        $sql = "INSERT INTO $this->table($fields) VALUES $valueSetsStr";

        $this->statement = $this->conn->prepare($sql);

        // Dynamically bind parameters
        $bindTypes = str_repeat('s', count($dataArray[0])); // Assuming all arrays have the same structure
        $this->statement->bind_param(str_repeat('s', count($values)), ...$values);

        $this->statement->execute();
        $affectedRows = $this->statement->affected_rows;

        $this->resetQuery();
        $this->conn->close();

        return $affectedRows;
    }
    public function update($fields, $value, $data = [])
    {
        $this->connect();
        $keyValues = [];
        foreach ($data as $key => $values) {
            $keyValues[] = $key . '=?';
        }
        $setFields = implode(',', $keyValues);

        $values = array_values($data);
        $sql = "UPDATE $this->table SET $setFields WHERE $fields = '$value'";
        $this->statement = $this->conn->prepare($sql);
        $this->statement->bind_param(str_repeat('s', count($data)), ...$values);
        $this->statement->execute();
        $this->resetQuery();
        $this->conn->close();
        return $this->statement->affected_rows;
    }
    public function delete(array $conditions)
    {
        $this->connect();

        // Build the WHERE clause
        $whereClauses = [];
        $params = [];
        $types = '';

        foreach ($conditions as $field => $value) {
            $whereClauses[] = "$field = ?";
            $params[] = $value;
            // Assuming all values are strings ('s'), adjust if needed
            $types .= 's';
        }

        // Join conditions with AND
        $whereString = implode(' AND ', $whereClauses);

        // Prepare the SQL statement
        $sql = "DELETE FROM $this->table WHERE $whereString";
        $this->statement = $this->conn->prepare($sql);

        // Bind parameters dynamically
        if (!empty($params)) {
            $this->statement->bind_param($types, ...$params);
        }

        // Execute and return affected rows
        $this->statement->execute();
        $affectedRows = $this->statement->affected_rows;

        $this->resetQuery();
        $this->conn->close();

        return $affectedRows;
    }
    public function search($searchTerm, $fields, $limit = 10, $offset = 0)
    {
        $this->connect();

        // Convert string to array if a single field is provided
        if (is_string($fields)) {
            $fields = [$fields];
        }

        // Check if fields is now a valid array
        if (!is_array($fields) || empty($fields)) {
            $this->conn->close();
            die("Error: Fields parameter must be a non-empty array or string");
        }

        // Build WHERE clause with LIKE conditions for each field
        $whereClauses = [];
        $params = [];
        $types = '';

        foreach ($fields as $field) {
            $whereClauses[] = "$field LIKE ?";
            $params[] = "%" . $searchTerm . "%";
            $types .= 's'; // Assuming all fields are strings
        }

        $whereClause = implode(' OR ', $whereClauses);
        $sql = "SELECT * FROM $this->table WHERE $whereClause LIMIT ? OFFSET ?";

        // Add limit and offset to parameters
        $params[] = $limit;
        $params[] = $offset;
        $types .= 'ii'; // Two integers for limit and offset

        // Prepare and execute the statement
        $this->statement = $this->conn->prepare($sql);
        $this->statement->bind_param($types, ...$params);
        $this->statement->execute();
        $result = $this->statement->get_result();
        $this->resetQuery();

        // Fetch results
        $returnData = [];
        while ($row = $result->fetch_object()) {
            $returnData[] = $row;
        }

        $this->conn->close();
        return $returnData;
    }
}
