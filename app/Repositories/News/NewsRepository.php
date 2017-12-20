<?php
namespace App\Repositories\News;
use App\Models\News;

class NewsRepository implements NewsRepositoryInterface
{
    public function all()
    {
        return News::all();
    }

    public function save($data)
    {
        $news =new News();
        if(isset($data['title'])) {
            $news->title = $data['title'];
            $news->slug = str_slug( $data['title'], '-');
        }else{
            $news->title = '';
            $news->slug = '';
        }
        if(isset($data['image'])) {
            $news->image = $data['image'];
        }else{
            $news->image = '';
        }
        if(isset($data['net_id'])) {
            $news->net_id = $data['net_id'];
        }else{
            $news->net_id = '';
        }
        if(isset($data['status'])) {
            $news->status = $data['status'];
        }else{
            $news->status = '';
        }
        if(isset($data['description'])) {
            $news->description = $data['description'];
        }else{
            $news->description = '';
        }
        $news->save();
    }

    public function update($data, $id)
    {
        $news = News::find($id);
        if($news) {
            if(isset($data['title'])) {
                $news->title = $data['title'];
                $news->slug = str_slug( $data['title'], '-');
            }else{
                $news->title = '';
                $news->slug = '';
            }
            if(isset($data['image'])) {
                $news->image = $data['image'];
            }else{
                $news->image = '';
            }
            if(isset($data['net_id'])) {
                $news->net_id = $data['net_id'];
            }else{
                $news->net_id = '';
            }
            if(isset($data['status'])) {
                $news->status = $data['status'];
            }else{
                $news->status = '';
            }
            if(isset($data['description'])) {
                $news->description = $data['description'];
            }else{
                $news->description = '';
            }
            return $news->save();
        } else {
            return false;
        }
    }

    public function find($id)
    {
        return News::find($id);
    }

    public function delete($id)
    {
        $news = News::find($id);
        if($news) {
            return $news->delete();
        } else {
            return false;
        }
    }

    public function findAttribute($attr, $name)
    {
       return News::where($attr, $name)->first();
    }

    public function checkExitsNameInUpdate($id, $name)
    {
        return  News::where('id','<>',$id)
        ->where('title', $name)
        ->count();
    }
    public function searchAndListInNews($title, $net, $status, $limit)
    {
        $query = News::select('news.*','net.name as net_name')
        ->join('net', 'net.id', '=', 'news.net_id');
        if($net != -1) {
            $query->where('news.net_id', $net);
        }
        if($title != '') {
            $query->where('news.title', 'like', "%$title%");
        }
        if($status != -1){
            $query->where('news.status', $status);
        }
        return $query->orderBy('news.created_at', 'DESC')->paginate($limit);
    }
    /**
     * --------------------- frontend-------------------------------------
     */
    public function newsStatus($status)
    {
        return News::where('status', $status)->get();
    }
}

?>