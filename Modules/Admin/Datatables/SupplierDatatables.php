<?php

namespace Modules\Admin\Datatables;

use App\Utilities\Generator;
use Yajra\DataTables\Facades\DataTables;

class SupplierDatatables
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
                $onclick = "showDeleteModal('$id')";
                $detailBtn = '<a href="javascript:void(0)" class="btn btn-outline-secondary btn-sm" title="Lihat detail">
                                <i class="fa fa-eye"></i>
                              </a>';
                $editBtn =  '<a href="' . route('admin.supplier.edit', $id) . '"
                                class="btn btn-outline-secondary mx-2 btn-sm" title="Ubah data">
                                    <i class="fa fa-edit"></i>
                             </a>';
                $deleteBtn = '<button type="button" style="padding: 4px 9px;"
                                class="btn btn-outline-secondary btn-sm delete-btn"
                                onclick="' . $onclick . '" data-toggle="modal" data-target="#delete" title="Hapus data">
                                <i class="fa fa-trash"></i>
                             </button>';
                $button = $detailBtn . $editBtn . $deleteBtn;
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}