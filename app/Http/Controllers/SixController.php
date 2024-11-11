<?php

namespace App\Http\Controllers;

use App\Models\TreeNode;
use Illuminate\Http\Request;
use PDOException;

class SixController extends Controller
{
    public function showSixthAdmin()
    {
        
        try{
            $system = "六代系統開發功能樹狀圖";
            $nodes = TreeNode::where('system','sixth')->whereNull('parent_id')
            ->with('childNode')->get();
            
            return view('admin.showFuncAdmin',compact('nodes','system'));
        }catch(PDOException $e){
            return $e->getMessage();
        }
        
    }

    public function showSixth()
    {
        
        try{
            $system = "六代系統開發功能樹狀圖";
            $nodes = TreeNode::where('system','sixth')->whereNull('parent_id')
            ->with('childNode')->get();
            
            return view('normal.showFunc',compact('nodes','system'));
        }catch(PDOException $e){
            return $e->getMessage();
        }
        
    }

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
        return redirect()->route('sixth.admin')->with('success', '新增成功');
    }

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
    
        return redirect()->route('sixth.admin')->with('success', '更新成功');
    }

    public function deleteNode(string $id){
        $node = TreeNode::findOrFail($id);
        $node->delete();
        
        return redirect()->route('sixth.admin')->with('success','刪除成功');
    }
}
