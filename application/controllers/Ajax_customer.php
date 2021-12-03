<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax_customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
    }
    public function galery($IDDU)
    {
        if (foto_prewedd($IDDU)) {
            foreach (foto_prewedd($IDDU) as $g) {
                $foto = $g['foto'];
                $IDG = $g['IDG'];
                $role = $this->session->userdata('role');
                $id_user = $this->session->userdata('id');
                $assets = base_url('assets');
                $output = <<<EOF
                    <div class="col-12 col-md-4">
                        <div class="card bg-light" style="width: 200px;">
                            <img class="card-img-top" src="$assets/img/$role/$id_user/$foto" alt="galery" style="object-fit: cover;width: 200px;height: 200px;">
                            <div class="card-footer d-flex justify-content-center">
                                <a href="" class="btn btn-sm btn-primary mr-1 px-3"><i class="flaticon-pen mr-2"></i>Rubah</a>
                                <button type="button" id="hapus-foto$IDG" class=" btn btn-sm btn-danger px-3"><i class="flaticon-interface-5 mr-2"></i>Hapus</button>
                            </div>
                        </div>
                    </div>
                    <script>
                        $('#hapus-foto$IDG').on('click', function() {
                            swal({
                                title: 'Yakin?',
                                text: "ingin menghapus foto ini?!",
                                type: 'warning',
                                buttons: {
                                    confirm: {
                                        text: 'Yakin!',
                                        className: 'btn btn-success'
                                    },
                                    cancel: {
                                        text: 'Batal!',
                                        visible: true,
                                        className: 'btn btn-danger'
                                    }
                                }
                            }).then((Delete) => {
                                if (Delete){
                                    hapus_foto('galery', 'IDG', '$IDG', '$foto')
                                }else{
                                    swal.close();
                                }
                            });
                        })
                    </script>
                EOF;
                echo $output;
            }
        }
    }
    public function tambah_galery($IDDU)
    {
        if (count($_FILES['foto']['name'])) {
            $galery = [];
            for ($i = 0; $i < count($_FILES['foto']['name']); $i++) {
                $galery[] =  [
                    'IDDU' => $IDDU,
                    'foto' => upload_foto('foto', $i)
                ];
            }
        }
        $this->db->insert_batch('galery', $galery);
        if ($this->db->affected_rows() > 0) {
            $output = [
                'status' => 'success',
                'judul' => 'Selamat!',
                'pesan' => 'Berhasil menambah foto',
                'button' => 'btn btn-success'
            ];
            echo json_encode($output);
        } else {
            $output = [
                'status' => 'error',
                'judul' => 'Opss..!',
                'pesan' => 'Gagal menambah foto',
                'button' => 'btn btn-danger'
            ];
            echo json_encode($output);
        }
    }
    public function virtual_account($IDDU)
    {
        $no = 1;
        foreach (virtual_account($IDDU) as $va) {
            $nama_VA = $va['nama_VA'];
            $nomer_VA = $va['nomer_VA'];
            $atas_nama = $va['A/N'];
            $IDVA = $va['IDVA'];
            $output = <<<EOF
                <tr>
                    <td>$no</td>
                    <td>$nama_VA</td>
                    <td>$nomer_VA</td>
                    <td>$atas_nama</td>
                    <td>
                        <span class="badge badge-pill badge-danger" id="hapus-va$IDVA" style="cursor: pointer;">HAPUS</span>
                    </td>
                </tr>
                <script>
                    $('#hapus-va$IDVA').on('click', function() {
                        swal({
                            title: 'Yakin?',
                            text: "ingin menghapus Virtual Akun?!",
                            type: 'warning',
                            buttons: {
                                confirm: {
                                    text: 'Yakin!',
                                    className: 'btn btn-success'
                                },
                                cancel: {
                                    text: 'Batal!',
                                    visible: true,
                                    className: 'btn btn-danger'
                                }
                            }
                        }).then((Delete) => {
                            if (Delete){
                                hapus_data('virtual_account', 'IDVA', $IDVA);
                                virtual_akun();
                                setTimeout(function(){
                                    window.location.reload();
                                }, 3000);
                            }else{
                                swal.close();
                            }
                        });
                    })
                </script>
            EOF;
            $no++;
            echo $output;
        }
    }
    public function tambah_va($IDDU)
    {
        $data = [
            'IDDU' => $IDDU,
            'nama_VA' => $this->input->post('nama_VA'),
            'nomer_VA' => $this->input->post('nomer_VA'),
            'A/N' => $this->input->post('atas_nama'),
        ];
        $hasil = $this->CRUD->tambah_data('virtual_account', $data);
        if ($hasil == true) {
            $output = [
                'status' => 'success',
                'judul' => 'Selamat!',
                'pesan' => 'Berhasil menambah virtual akun',
                'button' => 'btn btn-success'
            ];
        } else {
            $output = [
                'status' => 'error',
                'judul' => 'Opss...!',
                'pesan' => 'Gagal menambah virtual akun',
                'button' => 'btn btn-danger'
            ];
        }
        echo json_encode($output);
    }
}
