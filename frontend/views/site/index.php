<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */

$this->title = 'PPAU';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row" align="center">
    <div class="col-lg-15" align="center">
        <p><a class="btn btn-success" href="http://localhost/PPAU/frontend/web/index.php?r=tbl-permohonan">SENARAI PERMOHONAN</a></p>
        <br><h4>SENARAI PERMOHONAN BELUM DIPROSES</h4><br>
        <div align="left">
           
        </div>
        <div class="table-responsive" align="center">
            <div class="table-responsive" align="center">
                <table class="table table-bordered table-hover table-striped" align="center">
                    <thead>
                        <tr class="success" align="center">
                            <th>Tarikh Permohonan</th>
                            <th>Status Permohonan</th>
                        </tr>
                    </thead>
                    <tbody>                        
                            <?php 
                                foreach ($view as $row){
                                    echo "<tr>";
                                    echo "<td>".$row['tarikh']."</td>";
                                    echo "<td>".$row['status']."</td>";
                                    echo "</tr>";
                                }
                            ?>                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>