<?php
// 3xpush Script - Push Subscription Management System 
// Copyright 2020 Evgeniy Orel
// Site: https://script.3xpush.com/
// Email: script@3xpush.com
// Telegram: @Evgenfalcon
//
// ======================================================================
// This file is part of 3xpush Script.
//
// 3xpush Script is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// 3xpush Script is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with 3xpush Script.  If not, see <https://www.gnu.org/licenses/>.
//======================================================================

if(count(get_included_files()) ==1) exit("Direct access not permitted.");

?>

<div class="page-inner">
<div class="page-header">
<h4 class="page-title"><?php echo _MESSAGES ?></h4>
</div>      
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                         <div class="card-body card-block">
                            <form name="filters" action="index.php" method="get" id="searchform" class="form-horizontal">
                             <?php
 
                             $text = text_filter($_GET['text']);

                                     if ($text) {
                                     $where .= "AND text LIKE '%$text%' ";
                                     }
                                      $where .= "AND admin_id=".$check_login['id']." ";
                                      $alerts = alerts($where, 100);
                                      alerts_update($check_login['id']);
                                     ?>
                             <div class="row form-group">
                                 <div class="col col-md-3"><input type="text" name="text" placeholder="<?php echo _TEXT; ?>" value="<?php echo $text ?>"  class="form-control form-control-sm"></div>


                                 <input name="m" type="hidden" value="<?php echo $module ?>">
                                  <button class="btn btn-primary btn-sm">
                                  <i class="fa fa-search"></i> <?php echo _SEARCH ?>
                                 </button>
                                  <a href="?m=<?php echo $module ?>" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> <?php echo _RESET ?></a>    </div>
                             </form>
                             </div>

                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><?php echo _TIME; ?></th>
                                            <th><?php echo _TYPE; ?></th>
                                            <th><?php echo _TEXT; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                     if ($alerts!=false) {
                                      foreach ($alerts as $key => $value) {
                                       if ($value['view']==0) $new = '<i class="fa fa-eye"></i>'; else $new = '';
                                      	 echo "<tr>
                                            <td width=15%>".$value['date']." ".$new."</td>
                                            <td width=5%>".$value['type']."</td>
                                            <td>".$value['text']."</td>
                                        </tr>";
                                      }
                                     }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->