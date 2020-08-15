<?php

namespace App\DataTables;

use App\Models\Rezervasyonlar;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RezervasyonlarTableDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('#', function ($s){
                return $s->id;
            })
            ->editColumn('durum',function ($x){

                return '<a href="javascript:durumdegistir('.$x->id.')" class="btn btn-hero-success btn-hero-sm"><i class="fa fa-check"></i></a>
                                        <a href="'.route('yonetim.Rezervasyonlar.edit',$x->id).'" class="btn btn-hero-primary btn-hero-sm"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:sil('.$x->id.')" type="submit" class="btn btn-hero-danger btn-hero-sm m-1"><i
                                                class="fa fa-trash"></i></a>';


            })
            ->editColumn('salon_id',function($x){
                return $x->salon->adi;
            })
            ->rawColumns(['#','not','durum']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\RezervasyonlarTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Rezervasyonlar $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('rezervasyontablo')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('excel'),
                        Button::make('print')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('#')
                  ->exportable(true)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('adsoyad'),
            Column::make('not'),
            Column::make('tarih'),
            Column::make('telefon'),
            Column::make('salon_id'),
            Column::make('durum')

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'RezervasyonlarTable_' . date('YmdHis');
    }
}
