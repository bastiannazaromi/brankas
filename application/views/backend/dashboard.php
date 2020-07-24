<section class="content">

  <div class="row">
    <div class="col-lg-4 col-12">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3 id="tuser"></h3>

          <p>Total User</p>
        </div>
        <div class="icon">
          <i class="fas fa-user fa-2x"></i>
        </div>
        <a href="<?= base_url('Dashboard/user') ; ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3 id="triwayat"></h3>

          <p>Total Riwayat</p>
        </div>
        <div class="icon">
          <i class="fas fa-history fa-2x"></i>
        </div>
        <a href="<?= base_url('Dashboard/riwayat') ; ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3 id="hari_ini"></h3>

          <p>Riwayat Hari Ini</p>
        </div>
        <div class="icon">
          <i class="fas fa-history fa-2x"></i>
        </div>
        <a href="<?= base_url('Dashboard/riwayat') ; ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    
  </div>

</section>

<script>

  function tampil(){
    $.ajax({
        url: "<?= base_url('Dashboard/dashboard_realtime')?>",
        dataType: 'json',
        success:function(result){
          
          $('#tuser').text(result["user"]);

          $('#triwayat').text(result["riwayat"]);
          $('#hari_ini').text(result["hari_ini"]);
          
          setTimeout(tampil, 2000); 
        }
    });
  }
  
  document.addEventListener('DOMContentLoaded',function(){
    tampil();
  });   

</script>