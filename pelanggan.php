<script type="text/javascript">
  function Tambah(){
    document.getElementById("action").value="insert";

    document.getElementById("id_pelanggan").value=" ";
    document.getElementById("nama_pelanggan").value=" ";
    document.getElementById("alamat_pelanggan").value=" ";
    document.getElementById("kontak").value=" ";
  }
  function Edit(index){
    document.getElementById("action").value="update";

    var table= document.getElementById("table_pelanggan");
    var id_pelanggan=table.rows[index].cells[0].innerHTML;
    var nama_pelanggan=table.rows[index].cells[1].innerHTML;
    var alamat_pelanggan=table.rows[index].cells[2].innerHTML;
    var kontak=table.rows[index].cells[3].innerHTML;

    document.getElementById("id_pelanggan").value =id_pelanggan;
    document.getElementById("nama_pelanggan").value =nama_pelanggan;
    document.getElementById("alamat_pelanggan").value =alamat_pelanggan;
    document.getElementById("kontak").value =kontak;
  }
</script>
  <div class="card-col-sm-12">
    <div class="card-header bg-info text-white">
      <h4>Daftar Pelanggan</h4>
    </div>
    <div class="card-body">
      <?php if (isset($_SESSION["message"])) : ?>
        <div class="alert alert-<?=($_SESSION["message"]["type"])?>">
          <?php echo $_SESSION["message"]["message"]; ?>
          <?php unset($_SESSION["message"]); ?>
        </div>
      <?php endif; ?>
      <?php
      $koneksi = mysqli_connect("localhost", "root","", "penyewaan");
      if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
      }

      $sql ="select * from pelanggan";
      $result = mysqli_query($koneksi, $sql);
      $count =mysqli_num_rows($result);
       ?>
       <?php if ($count == 0):?>
         <div class="alert alert-info">
            Data is Empty
         </div>
       <?php else: ?>
         <table class="table" id="table_pelanggan">
           <thead>
             <tr>
               <td>ID Pelanggan</td>
               <td>Nama</td>
               <td>Alamat</td>
               <td>Kontak</td>
               <td>Opsi</td>
             </tr>
           </thead>
           <tbody>
             <?php foreach ($result as $hasil):?>
               <tr>
                 <td><?php echo $hasil["id_pelanggan"];?></td>
                 <td><?php echo $hasil["nama_pelanggan"];?></td>
                 <td><?php echo $hasil["alamat_pelanggan"];?></td>
                 <td><?php echo $hasil["kontak"];?></td>

                 <td>
                   <button type="button" class="btn btn-primary"
                   data-toggle="modal" data-target="#modal"
                   onclick="Edit(this.parentElement.parentElement.rowIndex)">
                    Edit
                 </button>
                 <a href="database_pelanggan.php?hapus=pelanggan&id_pelanggan=<?php echo $hasil["id_pelanggan"];?>"
                   onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                   <button type="button" class="btn btn-danger">
                     Hapus
                   </button>
                 </a>
                 </td>
               </tr>
           </tbody>
         <?php endforeach;?>
         </table>
       <?php endif;?>
    </div>
    <div class="card-footer">
      <button type="button" class="btn btn-success"
      data-toggle="modal" data-target="#modal" onclick="Tambah()">
        Tambah Data
    </button>
    </div>
  </div>
</div>

<div class="modal fade" id="modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="database_pelanggan.php" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h4>Form Pelanggan</h4>
          <span class="close" data-dismiss="modal">&times;</span>
        </div>
        <div class="modal-body">
          <input type="hidden" name="action" id="action"/>
          ID Pelanggan
          <input type="text" name="id_pelanggan" id="id_pelanggan" class="form-control">
          Nama
          <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control">
           Alamat
          <input type="text" name="alamat_pelanggan" id="alamat_pelanggan" class="form-control">
          Kontak
          <input type="text" name="kontak" id="kontak" class="form-control">
         
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">
            Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
