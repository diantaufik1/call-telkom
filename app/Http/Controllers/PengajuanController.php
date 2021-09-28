<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengajuan;
use App\Models\Teknisi;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Dompdf\Dompdf;
use Dompdf\Options;
use mysqli;
use App\Exports\PengajuanExport;
use Maatwebsite\Excel\Facades\Excel;
use Telegram\Bot\Api;


class PengajuanController extends Controller
{
    //
    public function index()
    {
        return view('add.index');
    }

    function add(Request $request)
    {
        $request->validate(
            [
                'id_pelanggan' => 'required',
                'nama_pelanggan' => 'required',
                'no_whatsapp' => 'required',
                'no_telepon' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'jam_kunjung' => 'required',
                'jenis_layanan' => 'required',
                'masalah' => 'required',
            ],
            [
                'id_pelanggan.required' => 'Please Input ID pelanggan',
                'nama_pelanggan.required' => 'Please Input Name',
                'no_whatsapp.required' => 'Please Input Nomer Whatsapp',
                'no_telepon.required' => 'Please Input Nomer Telepon',
                'latitude.required' => 'Please Input Latitude',
                'longitude.required' => 'Please Input Longitude',
                'jam_kunjung.required' => 'Please Input ID Jam Kunjung',
                'jenis_layanan.required' => 'Please Input Jenis Pelayanan',
                'masalah.required' => 'Please Input Masalah',
            ]
        );
        //gaul
        $id_pel =  $request->input('id_pelanggan');
        $jenis_la =  $request->input('jenis_layanan');
        $ga = DB::table('pengajuans')
            ->where('id_pelanggan', '=', $id_pel)
            ->where('jenis_layanan', '=', $jenis_la)
            ->count();
        // $gaul = $ga;
        $gaull = $ga;

        $date = date('Y-m-d H:i:s');
        $hapus = date('Y-m-d');
        $ko = DB::table('pengajuans')->max('id');
        $kode = $ko + 1;
        $kode_antrian = "Tel$kode";
        $query = DB::table('pengajuans')->insert([
            'id_pelanggan' => $request->input('id_pelanggan'),
            'kode_antrian' => $kode_antrian,
            'nama_pelanggan' => $request->input('nama_pelanggan'),
            'no_whatsapp' => $request->input('no_whatsapp'),
            'no_telepon' => $request->input('no_telepon'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'jam_kunjung' => $request->input('jam_kunjung'),
            'jenis_layanan' => $request->input('jenis_layanan'),
            'penyebab_gangguan' => '',
            'solusi_aktual' => '',
            'gaul' => $gaull,
            'masalah' => $request->input('masalah'),
            'status' => 'proses',
            'tanggal_pengajuan' => $date,
            'selesai_pengajuan' => '',
            'hapus' => $hapus,

        ]);
        if ($query) {

            $name = $request->input('nama_pelanggan');
            $nowa = $request->input('no_whatsapp');
            $notlp = $request->input('no_telepon');
            $lat = $request->input('latitude');
            $long = $request->input('longitude');
            $jamK = $request->input('jam_kunjung');
            $masalah = $request->input('masalah');

            echo "<x-app-layout>";
            echo "
            <div class='container' align='center'>
                <div style='width: 90%; height: auto; border: 2px solid black; border-radius: 10px; padding:5%;'>
                    <div style='margin: 1%'>
                        <img src='https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fputrichairina.com%2Fwp-content%2Fuploads%2F2016%2F12%2Findihome-icon.png&f=1&nofb=1' width='200'>
                        <table>
                        <tr>
                            <td>Nama :</td>
                            <td>:</td>
                            <td>$name</td>
                        </tr>

                        <tr>
                            <td>Nomer WhatsUp</td>
                            <td>:</td>
                            <td>$nowa</td>
                        </tr>
                        <tr>
                            <td>No Telfon</td>
                            <td>:</td>
                            <td>$notlp</td>
                        </tr>
                        <tr>
                            <td>Latitude</td>
                            <td>:</td>
                            <td>$lat</td>
                        </tr>
                        <tr>
                            <td>Longitude</td>
                            <td>:</td>
                            <td>$long</td>
                        </tr>
                        <tr>
                            <td>Jam Kunjung</td>
                            <td>:</td>
                            <td>$jamK</td>
                        </tr>
                        <tr>
                            <td>Masalah</td>
                            <td>:</td>
                            <td>$masalah</td>
                        </tr>
                        <tr>
                            <td>Tanggal Pengajuan</td>
                            <td>:</td>
                            <td>$date</td>
                        </tr>
                        <tr>
                            <td>Kode Antrian</td>
                            <td>:</td>
                            <td>$kode_antrian</td>
                        </tr>
                        </table>

                        <br>
                        <div style='margin:2%;'>
                            <a href='proses' onclick='window.print()' style='text-decoration: none; color: white; border-radius: 10px; background: red; padding:1%; text-sedow: 2px 2px 10px solid black; margin:10%;'>Cetak Kode Antrian</a>
                        </div>
                    </div>
                </div>
            </div>




            ";
            echo "</x-app-layout>";
        } else {
            return back()->with('Failed', 'Something went worng');
        }
    }

    function edit($id)
    {
        $row = DB::table('pengajuans')
            ->where('id', $id)
            ->first();
        $data = [
            'info' => $row,
            'Title' => 'Edit',
        ];
        return view('add.edit', $data);
    }


    function update(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'no_whatsapp' => 'required',
            'no_telepon' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'jam_kunjung' => 'required',
            'penyebab' => 'required',
            'solusi_aktual' => 'required',
            'masalah' => 'required',
        ]);

        $date = date('Y-m-d H:i:s');

        $updating = DB::table('pengajuans')
            ->where('id', $request->input('cid'))
            ->update([
                'nama_pelanggan' => $request->input('nama_pelanggan'),
                'no_whatsapp' => $request->input('no_whatsapp'),
                'no_telepon' => $request->input('no_telepon'),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                'jam_kunjung' => $request->input('jam_kunjung'),
                'penyebab_gangguan' => $request->input('penyebab'),
                'solusi_aktual' => $request->input('solusi_aktual'),
                'masalah' => $request->input('masalah'),
                'status' => $request->input('status'),
                'selesai_pengajuan' => $date,

            ]);
        return redirect('dashboard')->with('Success', 'Data Updated Successfully');
    }

    function kirim($id)
    {
        $row = DB::table('pengajuans')
            ->where('id', $id)
            ->first();

        $tek = DB::table('teknisis')->get();

        $data = [
            'tek' => $tek,
            'info' => $row,
            'Title' => 'Kirim',
        ];

        return view('add.kirim', $data);
    }


    function kirimt(Request $request)
    {
        $id = $request->input('id_pelanggan');
        $nama = $request->input('nama_pelanggan');
        $nowa = $request->input('no_whatsapp');
        $notlp = $request->input('no_telepon');
        $lat = $request->input('latitude');
        $long = $request->input('longitude');
        $jamk = $request->input('jam_kunjung');
        $kode_antrian = $request->input('kode_antrian');
        $jenis_layanan = $request->input('jenis_layanan');
        $solusi_segmen = $request->input('solusi_segmen');
        $solusi_aktual = $request->input('solusi_aktual');
        $gaul = $request->input('gaul');
        $masalah = $request->input('masalah');
        $status = $request->input('status');

        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));

        $response = $telegram->sendMessage([
            'chat_id' => $id,
            'text' => 'nama: ' . $nama . ' , No WhatsUp: ' . $nowa . ' , No Telepon: ' . $notlp . ' , Lokasi: ' . $lat . ", " . $long .  ' , Jam Kunjung: ' . $jamk . ' , Kode Antrian: ' . $kode_antrian . ' , Jenis Layanan: ' . $jenis_layanan . ' , Penyebab Gangguan: ' . $solusi_segmen . ' , Solusi Aktual: ' . $solusi_aktual . ' , Gaul: ' . $gaul . ' , Masalah: ' . $masalah . ' , Status: ' . $status
        ]);

        $messageId = $response->getMessageId();

        // return Redirect()->back()->with('Success', 'Data sent successfully');
        return redirect('dashboard')->with('Success', 'Data sent successfully');
    }


    function delete($id)
    {
        $delete = DB::table('pengajuans')
            ->where('id', $id)
            ->delete();

        return redirect('dashboard')->with('Success', 'Delete Data Successfull');
        // return redirect('dashboard');
    }
    function print()
    {
        $Pengajuans = DB::table('pengajuans')->get();
        return view('print', compact('Pengajuans'));
    }

    private $excel;
    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    function printpdf()
    {
        return (new PengajuanExport)->download('invoices.pdf', \Maatwebsite\Excel\Excel::DOMPDF);

        // $Pengajuans = DB::table('pengajuans')->get();
        // $html = view('printpdf', compact('Pengajuans'));

        // // instantiate and use the dompdf class
        // $dompdf = new Dompdf();
        // // $options = new Options();
        // $dompdf->loadHtml($html);

        // // $options->set('defaultFont', 'Courier');
        // // $dompdf = new Dompdf($options);

        // // (Optional) Setup the paper size and orientation
        // $dompdf->setPaper('A4', 'landscape');
        // $dompdf->getOptions()->setIsHtml5ParserEnabled(true);

        // // Render the HTML as PDF
        // $dompdf->render();

        // // Output the generated PDF to Browser
        // $dompdf->stream();
    }

    public function export()
    {
        return (new PengajuanExport)->download('pengajuan.xlsx');
    }
}
