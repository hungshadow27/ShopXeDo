<?php
class PostModel
{
    use Database;

    public function getAllPosts()
    {
        $rs = $this->table("posts")
            ->getAll();
        return $rs;
    }

    public function getPostById($id)
    {
        $rs = $this->table("posts")
            ->getOne('id', $id);
        return $rs;
    }
    public function getRecentlyPosts()
    {
        $rs = $this->table("posts")
            ->limit(3)
            ->getAllDESC();
        return $rs;
    }

    public function addPost($title, $content, $thumbnail = null)
    {
        $data = [
            'title' => $title,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s')
        ];
        if ($thumbnail) {
            $data['thumbnail'] = $thumbnail;
        }
        $rs = $this->table('posts')
            ->insert($data);
        return $rs;
    }

    public function updatePost($id, $title, $content, $thumbnail = null)
    {
        $data = [
            'title' => $title,
            'content' => $content,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        if ($thumbnail) {
            $data['thumbnail'] = $thumbnail;
        }
        $rs = $this->table('posts')
            ->update('id', $id, $data);
        return $rs;
    }

    public function deletePost($id)
    {
        $rs = $this->table("posts")
            ->delete(['id' => $id]);
        return $rs;
    }
}
