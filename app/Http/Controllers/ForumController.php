<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use View;
use DB;


class ForumController extends BaseController {

	public function topics()
	{
		$topic = DB::table('topic')->get();
		return View::make('forum',['topic' => $topic]);
	}
	
	public function get_comment_by_id($id)
	{
		$data['topic'] =  DB::table('topic')->where('id',$id)->get();
		$data['comments'] = DB::table('comments')->where('topic_id',$id)->get();
		return View::make('topicPage',['data' => $data]);
	}
	
	 public function add_topic()
	{
		$data_topic = json_decode(file_get_contents('php://input'), true);
		$data_topic = $data_topic[0];
		$result = DB::insert('insert into topic (header, content) values (?, ?)', [$data_topic['header'], $data_topic['content']]); 
		echo $result;
	}
	
	public function remove_topic()
    {
        $data= json_decode(file_get_contents('php://input'), true);
		$data = $data[0];
        if($data['id']){
			$result = DB::table('topic')->where('id', $data['id'])->delete();
        }
        echo $result;
    }
	
	public function update_topic()
    {
        $data_topic = json_decode(file_get_contents('php://input'), true);
		$data_topic = $data_topic[0];
        $result = DB::table('topic')->where('id', $data_topic['id'])->update(['header' => $data_topic['header']]);
        echo $result;
    }
}
