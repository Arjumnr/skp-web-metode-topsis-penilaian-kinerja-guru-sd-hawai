<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ModelGuru;
use App\Models\ModelKriteria;
use App\Models\ModelResponden;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TopsisController extends Controller
{
    public function index(Request $request)
    {
        $title  = 'Topsis';
        $dataKriteria = ModelKriteria::all();
        //berapa jumlah kode k1 d kriteria
        $jmlK1 = ModelKriteria::where('kode', 'K1')->count();
        $jmlK2 = ModelKriteria::where('kode', 'K2')->count();
        $jmlK3 = ModelKriteria::where('kode', 'K3')->count();
        $jmlK4 = ModelKriteria::where('kode', 'K4')->count();
        $jmlK5 = ModelKriteria::where('kode', 'K5')->count();

        $bobotK1 = 5;
        $bobotK2 = 4;
        $bobotK3 = 3;
        $bobotK4 = 2;
        $bobotK5 = 1;

        $dataResponden = ModelResponden::all();
        $dataGuru = ModelGuru::all();
        // $bobotK1 = 0;
        $totDataK1 = 0;

        $dataTOTk1 = 0;

        foreach ($dataGuru as $key => $value) {

                


            foreach ($dataResponden as $key2 => $value2) {
                if ($value->id == $value2->guru_id) {
                    $totResGuru = ModelResponden::where('guru_id', $value->id)->count();

                    // $allK1 = ModelResponden::where(function ($query) use ($value) {
                    //     $query->where('guru_id', $value->id)
                    //         ->whereHas('getKriteria', function ($query) {
                    //             $query->where('kode', 'K1');
                    //         });
                    // })->get();

                    // $allK2 = ModelResponden::where(function ($query) use ($value) {
                    //     $query->where('guru_id', $value->id)
                    //         ->whereHas('getKriteria', function ($query) {
                    //             $query->where('kode', 'K2');
                    //         });
                    // })->get();

                    // $allK3 = ModelResponden::where(function ($query) use ($value) {
                    //     $query->where('guru_id', $value->id)
                    //         ->whereHas('getKriteria', function ($query) {
                    //             $query->where('kode', 'K3');
                    //         });
                    // })->get();

                    // $allK4 = ModelResponden::where(function ($query) use ($value) {
                    //     $query->where('guru_id', $value->id)
                    //         ->whereHas('getKriteria', function ($query) {
                    //             $query->where('kode', 'K4');
                    //         });
                    // })->get();

                    // $allK5 = ModelResponden::where(function ($query) use ($value) {
                    //     $query->where('guru_id', $value->id)
                    //         ->whereHas('getKriteria', function ($query) {
                    //             $query->where('kode', 'K5');
                    //         });
                    // })->get();

                    // $isiK1 = [];
                    // $isiK2 = [];
                    // $isiK3 = [];
                    // $isiK4 = [];
                    // $isiK5 = [];

                    // foreach ($allK1 as $key3 => $value3) {
                    //     $isiK1[] = $value3->bobot;
                    // }

                    // foreach ($allK2 as $key3 => $value3) {
                    //     $isiK2[] = $value3->bobot;
                    // }

                    // foreach ($allK3 as $key3 => $value3) {
                    //     $isiK3[] = $value3->bobot;
                    // }

                    // foreach ($allK4 as $key3 => $value3) {
                    //     $isiK4[] = $value3->bobot;
                    // }

                    // foreach ($allK5 as $key3 => $value3) {
                    //     $isiK5[] = $value3->bobot;
                    // }

                    // $dataGuru[$key]['isiK1'] =  $isiK1;

                    $totResGuruK1 = ModelResponden::where(function ($query) use ($value) {
                        $query->where('guru_id', $value->id)
                            ->whereHas('getKriteria', function ($query) {
                                $query->where('kode', 'K1');
                            });
                    })->count();

                    $totResGuruK2 = ModelResponden::where(function ($query) use ($value) {
                        $query->where('guru_id', $value->id)
                            ->whereHas('getKriteria', function ($query) {
                                $query->where('kode', 'K2');
                            });
                    })->count();

                    $totResGuruK3 = ModelResponden::where(function ($query) use ($value) {
                        $query->where('guru_id', $value->id)
                            ->whereHas('getKriteria', function ($query) {
                                $query->where('kode', 'K3');
                            });
                    })->count();

                    $totResGuruK4 = ModelResponden::where(function ($query) use ($value) {
                        $query->where('guru_id', $value->id)
                            ->whereHas('getKriteria', function ($query) {
                                $query->where('kode', 'K4');
                            });
                    })->count();
                    
                    $totResGuruK5 = ModelResponden::where(function ($query) use ($value) {
                        $query->where('guru_id', $value->id)
                            ->whereHas('getKriteria', function ($query) {
                                $query->where('kode', 'K5');
                            });
                    })->count();



                    $sumK1 = ModelResponden::where(function ($query) use ($value) {
                        $query->where('guru_id', $value->id)
                            ->whereHas('getKriteria', function ($query) {
                                $query->where('kode', 'K1');
                            });
                    })->sum('bobot');

                    $sumK2 = ModelResponden::where(function ($query) use ($value) {
                        $query->where('guru_id', $value->id)
                            ->whereHas('getKriteria', function ($query) {
                                $query->where('kode', 'K2');
                            });
                    })->sum('bobot');

                    $sumK3 = ModelResponden::where(function ($query) use ($value) {
                        $query->where('guru_id', $value->id)
                            ->whereHas('getKriteria', function ($query) {
                                $query->where('kode', 'K3');
                            });
                    })->sum('bobot');

                    $sumK4 = ModelResponden::where(function ($query) use ($value) {
                        $query->where('guru_id', $value->id)
                            ->whereHas('getKriteria', function ($query) {
                                $query->where('kode', 'K4');
                            });
                    })->sum('bobot');

                    $sumK5 = ModelResponden::where(function ($query) use ($value) {
                        $query->where('guru_id', $value->id)
                            ->whereHas('getKriteria', function ($query) {
                                $query->where('kode', 'K5');
                            });
                    })->sum('bobot');

                    $dataGuru[$key]['totResGuru'] = $totResGuru;
                    $dataGuru[$key]['totResGuruK1'] = $totResGuruK1;
                    $dataGuru[$key]['totResGuruK2'] = $totResGuruK2;
                    $dataGuru[$key]['totResGuruK3'] = $totResGuruK3;
                    $dataGuru[$key]['totResGuruK4'] = $totResGuruK4;
                    $dataGuru[$key]['totResGuruK5'] = $totResGuruK5;

                    $dataGuru[$key]['sumK1'] = $sumK1;
                    $dataGuru[$key]['sumK2'] = $sumK2;
                    $dataGuru[$key]['sumK3'] = $sumK3;
                    $dataGuru[$key]['sumK4'] = $sumK4;
                    $dataGuru[$key]['sumK5'] = $sumK5;

                    $sumK1 = $sumK1 / $totResGuruK1;
                    $sumK2 = $sumK2 / $totResGuruK2;
                    $sumK3 = $sumK3 / $totResGuruK3;
                    $sumK4 = $sumK4 / $totResGuruK4;
                    $sumK5 = $sumK5 / $totResGuruK5;

                    $totK1 = number_format($sumK1, 4, '.', '');
                    $totK2 = number_format($sumK2, 4, '.', '');
                    $totK3 = number_format($sumK3, 4, '.', '');
                    $totK4 = number_format($sumK4, 4, '.', '');
                    $totK5 = number_format($sumK5, 4, '.', '');


                    $dataGuru[$key]['totK1'] =  $totK1;
                    $dataGuru[$key]['totK2'] = $totK2;
                    $dataGuru[$key]['totK3'] = $totK3;
                    $dataGuru[$key]['totK4'] = $totK4;
                    $dataGuru[$key]['totK5'] = $totK5;


                    // $dataGuru[$key]['pembagi_matriks_ternormalisasiK1'] = sqrt(???




                    
                    // $kriteriaId = $value2->getKriteria->kode;
                    // $dataGuru[$key]['hasil'] = '0,0023';
                    // $dataGuru[$key]['ket'] = 'Baik';
                    // switch($kriteriaId){
                    //     case 'K1':
                    //         $bobotK1 += $value2->bobot;
                    //         $dataGuru[$key]['bobotK1'] = $bobotK1;
                    //         $dataGuru[$key]['totK1'] = $bobotK1/$jmlK1;
                    //         break;
                    //     case 'K2':
                    //         $dataGuru[$key]['totK2'] = $value2->bobot;
                    //         break;
                    //     case 'K3':
                    //         $dataGuru[$key]['totK3'] = $value2->bobot;
                    //         break;
                    //     case 'K4':
                    //         $dataGuru[$key]['totK4'] = $value2->bobot;
                    //         break;
                    //     case 'K5':
                    //         $dataGuru[$key]['totK5'] = $value2->bobot;
                    //         break;

                    //     }  
                        
                    
                }

                
            }
        }

        // $dataTOTk1 = [];
        // foreach ($dataGuru as $key => $value) {
        //     $dataTOTk1[] = $value['totK1'];
        // }

        // $sum = collect($dataTOTk1)->sum(function ($number) {
        //     return (float) $number;
        // });

        // foreach ($dataTOTk1 as $key => $value) {
        //     $tot = 0;
        //     $tot += pow($value, 2);
        // }
        // return response()->json(sqrt($sum));
        $sumTotK1 = 0;
        $sumTotK2 = 0;
        $sumTotK3 = 0;
        $sumTotK4 = 0;
        $sumTotK5 = 0;
        foreach ($dataGuru as $key => $value) {
                $sumTotK1 += pow($value['totK1'], 2);
                $sumTotK2 += pow($value['totK2'], 2);
                $sumTotK3 += pow($value['totK3'], 2);
                $sumTotK4 += pow($value['totK4'], 2);
                $sumTotK5 += pow($value['totK5'], 2);
           
        }
        foreach ($dataGuru as $key => $value) {
            $dataGuru[$key]['pembagi_matriks_ternormalisasiK1'] = number_format(sqrt($sumTotK1), 4, '.', '');
            $dataGuru[$key]['pembagi_matriks_ternormalisasiK2'] = number_format(sqrt($sumTotK2), 4, '.', '');
            $dataGuru[$key]['pembagi_matriks_ternormalisasiK3'] = number_format(sqrt($sumTotK3), 4, '.', '');
            $dataGuru[$key]['pembagi_matriks_ternormalisasiK4'] = number_format(sqrt($sumTotK4), 4, '.', '');
            $dataGuru[$key]['pembagi_matriks_ternormalisasiK5'] = number_format(sqrt($sumTotK5), 4, '.', '');
        }

        foreach($dataGuru as $key => $value){
            $dataGuru[$key]['matriks_ternormalisasiK1'] = number_format($value['totK1']/$value['pembagi_matriks_ternormalisasiK1'], 4, '.', '');
            $dataGuru[$key]['matriks_ternormalisasiK2'] = number_format($value['totK2']/$value['pembagi_matriks_ternormalisasiK2'], 4, '.', '');
            $dataGuru[$key]['matriks_ternormalisasiK3'] = number_format($value['totK3']/$value['pembagi_matriks_ternormalisasiK3'], 4, '.', '');
            $dataGuru[$key]['matriks_ternormalisasiK4'] = number_format($value['totK4']/$value['pembagi_matriks_ternormalisasiK4'], 4, '.', '');
            $dataGuru[$key]['matriks_ternormalisasiK5'] = number_format($value['totK5']/$value['pembagi_matriks_ternormalisasiK5'], 4, '.', '');
        }

        foreach ($dataGuru as $key => $value) {
            $dataGuru[$key]['matriks_ternormalisasi_terbobotK1'] = number_format($value['matriks_ternormalisasiK1'] * $bobotK1, 4, '.', '');
            $dataGuru[$key]['matriks_ternormalisasi_terbobotK2'] = number_format($value['matriks_ternormalisasiK2'] * $bobotK2, 4, '.', '');
            $dataGuru[$key]['matriks_ternormalisasi_terbobotK3'] = number_format($value['matriks_ternormalisasiK3'] * $bobotK3, 4, '.', '');
            $dataGuru[$key]['matriks_ternormalisasi_terbobotK4'] = number_format($value['matriks_ternormalisasiK4'] * $bobotK4, 4, '.', '');
            $dataGuru[$key]['matriks_ternormalisasi_terbobotK5'] = number_format($value['matriks_ternormalisasiK5'] * $bobotK5, 4, '.', '');
        }

        //ideal positif dan ideal negatif 
        $dataMatriks_ternormalisasi_terbobotK1 = [];
        $dataMatriks_ternormalisasi_terbobotK2 = [];
        $dataMatriks_ternormalisasi_terbobotK3 = [];
        $dataMatriks_ternormalisasi_terbobotK4 = [];
        $dataMatriks_ternormalisasi_terbobotK5 = [];

        foreach ($dataGuru as $key => $value) {
            $dataMatriks_ternormalisasi_terbobotK1[] = $value['matriks_ternormalisasi_terbobotK1'];
            $dataMatriks_ternormalisasi_terbobotK2[] = $value['matriks_ternormalisasi_terbobotK2'];
            $dataMatriks_ternormalisasi_terbobotK3[] = $value['matriks_ternormalisasi_terbobotK3'];
            $dataMatriks_ternormalisasi_terbobotK4[] = $value['matriks_ternormalisasi_terbobotK4'];
            $dataMatriks_ternormalisasi_terbobotK5[] = $value['matriks_ternormalisasi_terbobotK5'];
        }

        $idealPositifK1 = max($dataMatriks_ternormalisasi_terbobotK1);
        $idealPositifK2 = max($dataMatriks_ternormalisasi_terbobotK2);
        $idealPositifK3 = max($dataMatriks_ternormalisasi_terbobotK3);
        $idealPositifK4 = max($dataMatriks_ternormalisasi_terbobotK4);
        $idealPositifK5 = max($dataMatriks_ternormalisasi_terbobotK5);

        $idealNegatifK1 = min($dataMatriks_ternormalisasi_terbobotK1);
        $idealNegatifK2 = min($dataMatriks_ternormalisasi_terbobotK2);
        $idealNegatifK3 = min($dataMatriks_ternormalisasi_terbobotK3);
        $idealNegatifK4 = min($dataMatriks_ternormalisasi_terbobotK4);
        $idealNegatifK5 = min($dataMatriks_ternormalisasi_terbobotK5);

        foreach ($dataGuru as $key => $value) {
            $dataGuru[$key]['idealPositifK1'] = $idealPositifK1;
            $dataGuru[$key]['idealPositifK2'] = $idealPositifK2;
            $dataGuru[$key]['idealPositifK3'] = $idealPositifK3;
            $dataGuru[$key]['idealPositifK4'] = $idealPositifK4;
            $dataGuru[$key]['idealPositifK5'] = $idealPositifK5;

            $dataGuru[$key]['idealNegatifK1'] = $idealNegatifK1;
            $dataGuru[$key]['idealNegatifK2'] = $idealNegatifK2;
            $dataGuru[$key]['idealNegatifK3'] = $idealNegatifK3;
            $dataGuru[$key]['idealNegatifK4'] = $idealNegatifK4;
            $dataGuru[$key]['idealNegatifK5'] = $idealNegatifK5;
        }

        //jarak antara nilai terbobot +-
        foreach ($dataGuru as $key => $value) {
            $dataGuru[$key]['jarakPositifK1'] = number_format(sqrt(pow($value['matriks_ternormalisasi_terbobotK1'] - $idealPositifK1, 2)), 4, '.', '');
            $dataGuru[$key]['jarakPositifK2'] = number_format(sqrt(pow($value['matriks_ternormalisasi_terbobotK2'] - $idealPositifK2, 2)), 4, '.', '');
            $dataGuru[$key]['jarakPositifK3'] = number_format(sqrt(pow($value['matriks_ternormalisasi_terbobotK3'] - $idealPositifK3, 2)), 4, '.', '');
            $dataGuru[$key]['jarakPositifK4'] = number_format(sqrt(pow($value['matriks_ternormalisasi_terbobotK4'] - $idealPositifK4, 2)), 4, '.', '');
            $dataGuru[$key]['jarakPositifK5'] = number_format(sqrt(pow($value['matriks_ternormalisasi_terbobotK5'] - $idealPositifK5, 2)), 4, '.', '');

            $dataGuru[$key]['jarakNegatifK1'] = number_format(sqrt(pow($value['matriks_ternormalisasi_terbobotK1'] - $idealNegatifK1, 2)), 4, '.', '');
            $dataGuru[$key]['jarakNegatifK2'] = number_format(sqrt(pow($value['matriks_ternormalisasi_terbobotK2'] - $idealNegatifK2, 2)), 4, '.', '');
            $dataGuru[$key]['jarakNegatifK3'] = number_format(sqrt(pow($value['matriks_ternormalisasi_terbobotK3'] - $idealNegatifK3, 2)), 4, '.', '');
            $dataGuru[$key]['jarakNegatifK4'] = number_format(sqrt(pow($value['matriks_ternormalisasi_terbobotK4'] - $idealNegatifK4, 2)), 4,
            '.', '');
            $dataGuru[$key]['jarakNegatifK5'] = number_format(sqrt(pow($value['matriks_ternormalisasi_terbobotK5'] - $idealNegatifK5, 2)), 4, '.', '');
        }


        //nilai preverensi 
        foreach ($dataGuru as $key => $value) {
            $dataGuru[$key]['nilaiPreferensif'] = number_format(($value['jarakNegatifK1'] / ($value['jarakNegatifK1'] + $value['jarakPositifK1'])), 4, '.', '');
        }

        //rank dari nilai preferensi
        $dataNilaiPreferensif = []; 
        foreach ($dataGuru as $key => $value) {
            $dataNilaiPreferensif[] = $value['nilaiPreferensif'];
        }

        // $rank = [];
        // $rank = $dataNilaiPreferensif;
        // rsort($rank);
        // $rank = array_values(array_unique($rank));
        // $rank = array_flip($rank);
        // return response()->json($rank);
        
        // foreach ($dataGuru as $key => $value) {
        //     //jika ada nilai yang sama maka akan di salah satu nilai tersebut akan di tambahkan 1
        //     $dataGuru[$key]['rank'] = $rank[$value['nilaiPreferensif']] + 1;
            
            
        //     // $dataGuru[$key]['rank'] = $rank[$value['nilaiPreferensif']] + 1;
        // }

        //ket Sangat Baik, Baik, Cukup, Kurang, Sangat Kurang berdasarkan nilai preferensi
        foreach ($dataGuru as $key => $value) {
            if ($value['nilaiPreferensif'] >= 0.8) {
                $dataGuru[$key]['ket'] = 'Sangat Baik';
            } elseif ($value['nilaiPreferensif'] >= 0.6) {
                $dataGuru[$key]['ket'] = 'Baik';
            } elseif ($value['nilaiPreferensif'] >= 0.4) {
                $dataGuru[$key]['ket'] = 'Cukup';
            } elseif ($value['nilaiPreferensif'] >= 0.2) {
                $dataGuru[$key]['ket'] = 'Kurang';
            } else {
                $dataGuru[$key]['ket'] = 'Sangat Kurang';
            }

            
        }


        
        


    //    return response()->json($dataGuru);

       
        if ($request->ajax()) {
            return DataTables::of($dataGuru)
                ->addIndexColumn()
                // ->addColumn('action', function ($row) {

                //     $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit "> <button type="button" class="btn rounded-pill btn-icon btn-primary">
                //         <span class="tf-icons bx bx-message-square-edit"></span>
                //       </button></a>';
                //     $btn = $btn . ' <button type="button" class="btn rounded-pill btn-icon btn-danger">
                //     <span class="tf-icons bx bx-trash-alt"></span>
                //   </button>';
                //     //     return $btn;
                //     return $btn;
                // })
                // ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('admin.topsis.index', compact('title'));
    }
}
