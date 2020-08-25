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

        $GLOBALS['art'] = 1;
        $query = Rezervasyonlar::whereDate('tarih','>=',date('Y-m-d'))->get();
        return datatables($query)
           // ->eloquent($query)
            ->addColumn('#',function () {
                global $art;
               return $art++;
            })
            ->editColumn('durum',function ($x){
                $drm = $x->durum == 1 ? 'success' : 'danger';
                $ico = $x->durum == 1 ? 'check' : 'times';
                return '<a href="javascript:durumdegistir('.$x->id.')" class="btn btn-hero-'.$drm.' btn-hero-sm"><i class="fa fa-'.$ico.'"></i></a>
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

                   ->orderBy(3,'desc')

                ->parameters([
                    'language'=>[
                        'url' => url('assets/datatable.tr.json')
                    ]

                ])


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
            Column::computed('#'),
            Column::make('adsoyad')->title('Ad Soyad'),
            Column::make('not')->title('Açıklama'),
            Column::make('tarih')->title('Tarih'),
            Column::make('telefon')->title('Telefon'),
            Column::make('salon_id')->title('Salon Adı'),
            Column::make('durum')->title('İşlemler')->orderable(false)->searchable(false)


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
