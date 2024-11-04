<?php

namespace App\Http\Controllers;

use App\Models\TreeNode;
use Illuminate\Http\Request;
use PDOException;

class MindController extends Controller
{

    //新建頁面
    public function showCreateForm()
    {
        return view('create');
    }

    //存進資料庫
    public function createNode(Request $request)
    {

        $request->validate([
            'value'=>'required',
            'system'=>'required',
        ]);

        $node = new TreeNode();
        $node->value = $request->input('value');
        $node->parent_id = $request->input('parent_id'); // 可以為 null 或指定父節點 ID
        $node->system = $request->input('system');

        if($node->parent_id){
            $parent = TreeNode::find($node->parent_id);
            $node->layer = $parent->layer + 1;
        } else {
            $node->layer = 1;
        }
        $node->save();

    }
    
    
    //顯示雲的功能圖
    public function showCloud()
    {
        try{
        $nodes = TreeNode::where('system','cloud')->whereNull('parent_id')->with('childNode')->get();
    
        return view('cloud', compact('nodes'));
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    //更動
    public function editNode()
    {
        
    }








    //刪除節點
    // public function delNode()
    // {
    //     $id = ;
    //     $node = TreeNode::find($id);
    //     $node->$table->softDeletes();
    // }
}
