<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use QL\QueryList;

class SearchController extends Controller
{
    //
    public function index(){
        $code = $_GET['code'] ?? false;
        if($code == false) return redirect('/');

        $ps = [
                '佐川急便' => [
                            'NG'   => '該当なし',
                            'url'  => "http://k2k.sagawa-exp.co.jp/p/web/okurijosearch.do?okurijoNo=$code",
                            'rule' => [
                                        'result'    => ['#MainList dt','text'],
                                        'code'      => ['#MainList strong','text'],
                                        'table'     => ['#detail-1','html'],
                            ]],
                '日本郵便' => [
                            'NG'   => null,
                            'url'  => "https://trackings.post.japanpost.jp/services/srv/search/?requestNo1=$code&search=追跡スタート",
                            'rule' => [
                                        'result'    => ['td.w_180','text'],
                                        'code'      => ['td.w_120','text'],
                                        'table'     => ['div .indent','html'],
                            ]],
                // 'ヤマト運輸' => [
                //             'NG'   => null,
                //             'url'  => "http://jizen.kuronekoyamato.co.jp/jizen/servlet/crjz.b.NQ0010?id=$code",
                //             'rule' => [
                //                         'html'  => ['html','html']
                //             ]],
                // 'ヤマト運輸' => [
                //             'NG'   => null,
                //             'url'  => "http://jizen.kuronekoyamato.co.jp/jizen/servlet/crjz.b.NQ0010?id=$code",
                //             'rule' => [
                //                         'result'    => ['td.bold','text'],
                //                         'code'      => ['td.bold','text'],
                //                         'table'     => ['.meisai','html'],
                //             ]],

        ];
        foreach( $ps as $key => $val ){
            $ndata = QueryList::get($val['url'])->rules($val['rule'])->query()->getData()->all();
            $ndata['deliv'] = $key; 
            $ndata['url'] = $val['url']; 
            ($ndata['result'] ?? null) == $val['NG'] ?: $data[] = $ndata;
        }


        print_r($data);
    }
}
