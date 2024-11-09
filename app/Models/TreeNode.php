<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TreeNode extends Model
{
    use HasFactory;
    protected $table = 'tree';

    protected $fillable = ['value', 'system'];

    public function parentNode():BelongsTo{
        return $this->belongsTo(TreeNode::class, 'parent_id');
    }
    public function childNode():HasMany{
        return $this->hasMany(TreeNode::class,'parent_id');
    }
    public function allChildren():HasMany{
        return $this->childNode()->with('allChildren');
    }

}
