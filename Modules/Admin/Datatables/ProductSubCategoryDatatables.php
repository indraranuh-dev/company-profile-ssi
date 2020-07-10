<?php

namespace Modules\Admin\Datatables;

use App\Utilities\Generator;
use Yajra\DataTables\Facades\DataTables;

class ProductSubCategoryDatatables
{
    /**
     * Renderiing become a datatables
     *
     * @param object $data
     * @return void
     */
    public static function renderAll($data)
    {
        return DataTables::collection($data)
            ->addColumn('action', function ($row) {
                $id = Generator::crypt($row->id, "encrypt");
                $edit = "showEditModal('$id')";
                $delete = "showDeleteModal('$id')";
                $editBtn =  '<a href="javascript:void(0)" onclick="' . $edit . '"
                                class="btn btn-outline-secondary mx-2 btn-sm" title="Ubah data">
                                    <i class="fa fa-edit fa-fw"></i>
                             </a>';
                $deleteBtn = '<a href="javascript:void(0)"
                                class="btn btn-outline-secondary btn-sm"
                                onclick="' . $delete . '" title="Hapus data">
                                <i class="fa fa-trash fa-fw"></i>
                             </button>';
                $button = $editBtn . $deleteBtn;
                return $button;
            })
            ->addColumn('categories_name', function ($row) {
                return $row->categories->map(function ($category) {
                    return '<span class="badge badge-primary">' . $category->name . '</span>';
                })->implode('<br>');
            })
            ->rawColumns(['action', 'categories_name'])
            ->make(true);
    }
}