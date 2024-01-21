<?php

class Dashboard {
    private $base_dir;
    private $db_connect;
    private $sidebar_selected;

    public function __construct() {
        $this->base_dir = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        require_once("{$this->base_dir}backend/dashboard.php");
        require_once("{$this->base_dir}config/db.php");
        $this->db_connect = $db_connect;
        $this->sidebar_selected = "dashboard";
    }

    public function count_pegawai() {
        $queryTotalAnggota = "SELECT COUNT(*) as total_members FROM pegawai WHERE Status_Deleted = 0";
        $resultTotalAnggota = mysqli_query($this->db_connect, $queryTotalAnggota);
        $rowTotalAnggota = mysqli_fetch_assoc($resultTotalAnggota);
        $totalTotalAnggota = $rowTotalAnggota['total_members'];
        return $totalTotalAnggota;
    }

    public function get_header() {
        require_once("{$this->base_dir}pages/core/header.php");
    }

    public function get_footer() {
        require_once("{$this->base_dir}pages/core/footer.php");
    }

    public function get_main_content() {
        $totalTotalAnggota = $this->count_pegawai();

        echo '
        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Dashboard</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">
                <div class="row">
                    <!-- Start Ngoding Disini -->
                    <div class="col-xxl-4 col-xl-12">

<div class="card info-card customers-card">


    <div class="card-body">
        <h5 class="card-title">Total pegawai Laboratorium </h5>

        <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
            </div>
            <div class="ps-3">
                <h6>', $totalTotalAnggota, '</h6>

            </div>
        </div>

    </div>
</div>

</div>

                    <!-- End Ngoding Disini -->

                </div>
            </section>
        </main><!-- End #main -->
        ';
    }
}

$dashboard = new Dashboard();
$dashboard->get_header();
$dashboard->get_main_content();
$dashboard->get_footer();

?>