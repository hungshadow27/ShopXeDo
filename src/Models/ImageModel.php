<?php
class ImageModel
{
    use Database;
    public function getImageByName($name)
    {
        $rs = $this->table("image")
            ->getOne('name', $name);
        return $rs;
    }
    public function getImageById($id)
    {
        $rs = $this->table("image")
            ->getOne('id', $id);
        return $rs;
    }
    public function getAllImage($limit, $offset)
    {
        $rs = $this->table("image")
            ->limit($limit)
            ->offset($offset)
            ->getAll();
        return $rs;
    }

    public function addImage($name, $file_name)
    {
        $rs = $this->table('image')
            ->insert([
                'name' => $name,
                'file_name' => $file_name
            ]);
        return $rs;
    }

    public function updateImageName($id, $name)
    {
        $rs = $this->table('image')
            ->update('id', $id, [
                'name' => $name
            ]);
        return $rs;
    }

    public function deleteImage($id)
    {
        $rs = $this->table("image")
            ->delete(['id' => $id]);
        return $rs;
    }
    public function getCountAllImage()
    {
        $rs = $this->table("image")
            ->count();
        return $rs;
    }
}
