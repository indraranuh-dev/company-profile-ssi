<?php

namespace Modules\Admin\Datatables;

use App\Utilities\Generator;
use Yajra\DataTables\Facades\DataTables;

class ProductDatatables
{
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
                                class="btn btn-outline-secondary btn-sm delete-btn"
                                onclick="' . $delete . '" title="Hapus data">
                                <i class="fa fa-trash fa-fw"></i>
                             </button>';
                $button = $editBtn . $deleteBtn;
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}