<?php //print_r($last_id);die; ?>
<div class="panel_Custom">
    <div class="row">
        <div class="HADING_TITTLE">
            <div class="col-md-4 col-sm-4">
                <div class="title">
                    <h2>Wallet Balance</h2>
                </div>
            </div>
            <div class="col-md-8 col-md-8">
                <div class="add_new">
                    <a href="<?php echo base_url(); ?>Booking/add_money"><span id="addnew">Add Money</span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row wallet_amount_container">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="wallet_amount_content text-center">
                <h3>Wallet Balance</h3>
                <input class="inputbox" type="text" readonly="readonly" name="waletAmt" value="<?php echo "$" .$total_amt->balance; ?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="HADING_TITTLE">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="title_two">
                    <h2>Credit Cards Payments History</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row BG_white">
    <?php foreach($last_id as $all){  ?>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="old_welt_history">
                <div class="old_welt_history_content">
                   <!--  <h4>Amount added from referral code.</h4> -->

                   
                   <div class="DAte_penal">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <h4>Date</h4>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <h5 class="pull-right">  <?php 
                                                $time = $all->date_created ;
                                                $utc_ts = strtotime($time);
                                                $offset = date("Z");
                                                $local_ts = $utc_ts + $offset;
                                                $local_time = date("Y-m-d g:i A", $local_ts); 
                                                $newDate = date("d-m-Y", strtotime($local_time));
                                                $time = date("g:i A", strtotime($local_time));
                                                echo $newDate. " at " .$time;
                                                ?>
                            </h5>
                        </div>
                   </div>

                   <div class="row1">
                        <?php $type = $all->txnId; if($type == "fromReferrel"){ ?>
                            <p>Amount added from referral code.</p>
                        <?php }elseif($type == "refund"){ ?>
                            <p>Amount refunded from promo code.</p>
                        <?php }elseif($type == "from_wallet"){ ?>
                            <p>Paid from credits.</p>
                        <?php }else{ ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <h4>Transaction ID</h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <h5 class="pull-right"><?php echo $all->txnId; ?></h5>
                            </div>
                        <?php } ?>
                   </div>
                   
                   <div class="row1">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <h4>Amount</h4>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <h5 class="pull-right">
                                <?php 
                                    $zero = $all->amount_credited;
                                    if($zero != 0){
                                        echo "$" .$all->amount_credited;
                                        echo "(Credited)";
                                    }else{
                                        echo "$" .$all->amount_debited;
                                        echo "(Debited)";
                                    }
                                ?>
                            </h5>
                        </div>
                   </div>                   

                   
                </div>
            </div>

        </div>
    <?php } ?>
    </div>
</div>
