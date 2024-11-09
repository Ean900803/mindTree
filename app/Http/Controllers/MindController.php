<?php

namespace App\Http\Controllers;

use App\Models\TreeNode;
use Illuminate\Http\Request;
use PDOException;

class MindController extends Controller
{

    //資料存資料庫
    public function storeNode(Request $request)
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
        return redirect()->route('funcTree.cloud')->with('success', '新增成功');
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
    

    //編輯存檔
    public function updateNode(Request $request,$id)
    {
        // dd($request->all());
        // dd($request->all());

        $request->validate([
            'value' => 'required|string',
            'system' => 'required|string',
        ]);
    
        $node = TreeNode::findOrFail($id);
        $node->value = $request->input('value');
        $node->system = $request->input('system');
        $node->save();
    
        return redirect()->route('funcTree.cloud')->with('success', '更新成功');
    }

    //刪除節點
    public function deleteNode(string $id){
        $node = TreeNode::findOrFail($id);
        $node->delete();
        
        return redirect()->route('funcTree.cloud')->with('success','刪除成功');
    }
}
