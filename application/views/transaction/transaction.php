<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
<style>
    .nav-tabs-custom {
        margin-bottom: 20px;
        background: #fff;
        box-shadow: 0 0px 1px rgba(0, 0, 0, 0.1);
        border-radius: 3px;
    }

    .hidden {

        visibility: hidden
    }

    .tab-pane {
        min-height: 120px;
        border-bottom: solid 1px #f4f4f4;
    }

    .input-checkbox {
        font-weight: normal !important;
    }

    .permission-button-group {
        padding: 15px 0 10px 20px;
    }
</style>

<style>
    .ui-autocomplete {
        position: absolute;
        z-index: 1000;
        cursor: default;
        padding: 0;
        margin-top: 2px;
        list-style: none;
        background-color: #ffffff;
        border: 1px solid #ccc;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    .ui-autocomplete>li {
        padding: 3px 20px;
    }

    .ui-autocomplete>li.ui-state-focus {
        background-color: #DDD;
    }

    .ui-helper-hidden-accessible {
        display: none;
    }
</style>
<br>
<div class="container">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-2">
                <a href="#step-1" type="button" class="btn btn-success btn-circle"> 1</a>
                <p><small>Create Shipment</small></p>
            </div>
            <div class="stepwizard-step col-xs-2">
                <a href="#step-2" type="button" class="btn btn-default btn-circle">2</a>
                <p><small>Port Details</small></p>
            </div>
            <div class="stepwizard-step col-xs-2">
                <a href="#step-3" type="button" class="btn btn-default btn-circle">3</a>
                <p><small>Plannes/Consignment</small></p>
            </div>
            <div class="stepwizard-step col-xs-2"> 
                <a href="#step-4" type="button" class="btn btn-default btn-circle" >4</a>
                <p><small>Summary</small></p>
            </div>

        </div>
    </div>

    <form role="form">
        <div class="col-md-11 ">
            <div class="panel panel-primary setup-content" id="step-1">
                <div class="panel-heading">
                    <h3 class="panel-title">Shipper</h3>
                </div>
                <div class="panel-body">
                    <div class=" row">
                        <div class="form-group">
                            <b>
                                <h4> &nbsp; &nbsp; Which type of shipment would you like to create ?</h4>
                            </b><br>
                            &nbsp; &nbsp;
                            <label>
                                <button class="btn btn-primary nextBtn pull-right trans-type" id="air" type="button" value="Air">Air</button>

                            </label> &nbsp; &nbsp;
                            <label>
                                <button class="btn btn-primary nextBtn pull-right trans-type" id="sea" type="button" value="Sea">Sea</button>

                            </label> &nbsp; &nbsp;
                            <label>
                                <button class="btn btn-primary nextBtn pull-right trans-type" id="transportation" type="button" value="Other">Other</button>


                            </label> &nbsp; &nbsp;
                            <label>
                                <button class="btn btn-primary nextBtn pull-right trans-type" id="land" type="button" value="Land">Land</button>


                            </label>&nbsp; &nbsp;
                        </div>
                    </div>
                </div>
                <!-- <button class="btn btn-primary nextBtn pull-right" type="button">Next</button> -->
            </div>
        </div>
        <div class="col-md-11 ">
            <div class="panel panel-primary setup-content" id="step-2">
                <div class="panel-heading">
                    <h3 class="panel-title">Shipper</h3>
                </div>
                <div class="panel-body">
                    <div class=" row">
                        <div class="form-group  col-md-3">
                            <label class="control-label ">Number</label>
                            <input type="hidden" name="id" id="id" value="<?php echo $values[0]->JobId; ?>" />
                            <input type="hidden" name="type" id="type" value="" />
                            <input type="text" id="code" name="code" class="form-control" placeholder="<?php echo $code[0]->Number + 1; ?>" readonly="readonly" value="<?php echo $code[0]->Number + 1; ?>">
                        </div>
                        <div class="form-group col-md-3">


                            <label class="control-label" for="date">Date</label>
                            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" />
                        </div>
                    </div>
                    <div class=" row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Shipper Name</label>
                            <input maxlength="100" type="text" required="required" id="shippername" class="form-control" placeholder="Enter shipper Name" />
                            <input maxlength="100" type="hidden" required="required" id="shipperid" class="form-control" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Consignee Name</label>
                            <input maxlength="100" type="text" required="required" id="consigneename" class="form-control" placeholder="Enter Consignee Name" />
                            <input maxlength="100" type="hidden" required="required" id="consignor_id" class="form-control" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputname1">Client Name</label>
                            <input type="hidden" name="client_id" id="client_id" value="" />
                            <select class="form-control" name="client_name" id="client_name" value="--Select Type--">
                                <option value="select">--Select Type--</option>
                                <?php

                                foreach ($clientlist as $client) {
                                    echo '<option value="' . $client->name . '" id="' . $client->id . '">' . $client->name . '</option>';
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class=" row">
                        <div class="form-group col-md-4">
                            <label for="exampleInputname1">Type</label>
                            <select class="form-control" name="shipment_type" id="shipment_type" value="--Select Type--">
                                <option value="bank">--Select Type--</option>
                                <option value="Import">Import</option>
                                <option value="Export">Export</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Shippment Terms</label>
                            <input maxlength="100" type="text" id="Shipment_Terms" required="required" class="form-control" placeholder="shipment terms" />
                        </div>
                    </div>
                    <div class=" row" id="airsection">
                        <div class="form-group col-md-4">
                            <label class="control-label"> Cargo Description</label>
                            <input maxlength="100" type="text" id="cargo_description" required="required" class="form-control" placeholder="Cargo Description" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Origin</label>
                            <input maxlength="100" type="text" id="origin_air" required="required" class="form-control" placeholder="Origin " />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Destination</label>
                            <input maxlength="100" type="text" id="destination_air" required="required" class="form-control" placeholder=" Destination" />
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label " for="date">ETD</label>
                            <input class="form-control etd_air" id="etd_air" name="date" placeholder="MM/DD/YYY" type="text" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="date">ETA</label>
                            <input class="form-control eta_air" id="eta_air" name="date" placeholder="MM/DD/YYY" type="text" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Carrier</label>
                            <!-- <input maxlength="100" type="text"  id="Carrier_air" required="required" class="form-control" placeholder=" Carrier" /> -->
                            <select class="form-control " name="Carrier_air" id="Carrier_air" value="">
                                <option value="select">--Select Type--</option>
                                <?php

                                foreach ($carrierlist as $carrier) {
                                    if ($carrier->carrier_type == "Air") {
                                        echo '<option code="' . $carrier->code . '" value="' . $carrier->name . '" id="' . $carrier->id . '">' . $carrier->name . '&nbsp;' . $carrier->code . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">PO no. </label>
                            <input maxlength="100" type="text" id="PoNo_air" required="required" class="form-control" placeholder=" PO no." />
                        </div>
                        <div class="col-md-4">
                            <div class="row">

                        <div class="form-group col-md-4">
                            <label class="control-label">MAWB </label>
                            <input maxlength="100" type="text" id="Mawb_air" required="required" class="form-control mawbcarrier" id="mawbcarrier" placeholder="privilage code" />
                        </div>
                        <div class="form-group col-md-8">
                            <label class="control-label"> &nbsp;</label>
                            <input maxlength="100" type="text" id="Mawb_code" required="required" class="form-control mawbcarrier" id="mawbcarrier" placeholder="enter serial number" />
                        </div>
                        </div>
                            </div>
                        <div class="form-group col-md-4">
                            <label class="control-label"> HAWB</label>
                            <input maxlength="100" type="text" id="Hawb" required="required" class="form-control" placeholder=" HAWB" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label"> No_pcs</label>
                            <input maxlength="100" type="text" id="Nopcs_air" required="required" class="form-control" placeholder=" No_pcs" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Actual Weight </label>
                            <input maxlength="100" type="text" id="ActualWeight_air" required="required" class="form-control" placeholder="Actual Weight" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Chargeable Weight </label>
                            <input maxlength="100" type="text" id="ChargeableWeight_air" required="required" class="form-control" placeholder="Chargeable Weight " />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Dimension</label>
                            <input maxlength="100" type="text" id="Dimension" required="required" class="form-control" placeholder="Dimension" />
                        </div>
                    </div>
                    <div class=" row" id="seasection">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="date">ETD</label>
                            <input class="form-control etd_sea" id="etd_sea" name="date" placeholder="MM/DD/YYY" type="text" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="date">ETA</label>
                            <input class="form-control eta_sea" id="eta_sea" name="date" placeholder="MM/DD/YYY" type="text" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Carrier</label>
                            <!-- <input maxlength="100" type="text" id="Carrier_sea" required="required" class="form-control" placeholder=" Carrier" /> -->
                            <select class="form-control" name="Carrier_sea" id="Carrier_sea" value="--Select Type--">
                                <option value="select">--Select Type--</option>
                                <?php

                                foreach ($carrierlist as $carrier) {
                                    if ($carrier->carrier_type == "Sea") {
                                        echo '<option value="' . $carrier->name . '" id="' . $carrier->id . '">' . $carrier->name . '&nbsp;' . $carrier->code . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">PO no. </label>
                            <input maxlength="100" type="text" id="PoNo_sea" required="required" class="form-control" placeholder=" PO no." />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label"> POL </label>
                            <input maxlength="100" type="text" id="Pol" required="required" class="form-control" placeholder="POL" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">POD</label>
                            <input maxlength="100" type="text" id="Pod" required="required" class="form-control" placeholder="POD " />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">MBL</label>
                            <input maxlength="100" type="text" id="Mbl_sea" required="required" class="form-control" placeholder=" MBL" />
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">HBL </label>
                            <input maxlength="100" type="text" id="Hbl" required="required" class="form-control" placeholder=" HBL" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label"> Cont.type</label>
                            <input maxlength="100" type="text" id="ContType" required="required" class="form-control" placeholder=" cont. type" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label"> No_Containers</label>
                            <input maxlength="100" type="text" id="NoContainers" required="required" class="form-control" placeholder=" No_containers" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Containers_no. </label>
                            <input maxlength="100" type="text" id="ContainerNo" required="required" class="form-control" placeholder="containers number" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Actual Weight </label>
                            <input maxlength="100" type="text" id="ActualWeight_sea" required="required" class="form-control" placeholder=" Weight " />
                        </div>

                    </div><br>
                    <div class=" row" id="transportationsection">
                        <div class="form-group col-md-4">
                            <label class="control-label">Origin</label>
                            <input maxlength="100" type="text" id="Origin_transport" required="required" class="form-control" placeholder=" origin" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Destination</label>
                            <input maxlength="100" type="text" id="Destination_transport" required="required" class="form-control" placeholder=" destination" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="date">ETD</label>
                            <input class="form-control etd_transport" id="etd_transport" name="date" placeholder="MM/DD/YYY" type="text" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="date">ETA</label>
                            <input class="form-control eta_transport" id="eta_transport" name="date" placeholder="MM/DD/YYY" type="text" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Carrier</label>
                            <!-- <input maxlength="100" type="text" id="Carrier_transport"  required="required" class="form-control" placeholder=" Carrier" /> -->
                            <select class="form-control" name="Carrier_transport" id="Carrier_transport" value="--Select Type--">
                                <option value="select">--Select Type--</option>
                                <?php

                                foreach ($carrierlist as $carrier) {
                                    if ($carrier->carrier_type == "Other") {
                                        echo '<option value="' . $carrier->name . '" id="' . $carrier->id . '">' . $carrier->name . '&nbsp;' . $carrier->code . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">PO no. </label>
                            <input maxlength="100" type="text" id="PoNo_transport" required="required" class="form-control" placeholder=" PO no." />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label"> MBL </label>
                            <input maxlength="100" type="text" id="Mbl_transport" required="required" class="form-control" placeholder="MBL" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">No.pcs</label>
                            <input maxlength="100" type="text" id="Nopcs_transport" required="required" class="form-control" placeholder="no-pcs " />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Truck_no</label>
                            <input maxlength="100" type="text" id="TruckNo" required="required" class="form-control" placeholder=" truck number" />
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">Actual Weight </label>
                            <input maxlength="100" type="text" id="ActualWeight_transport" required="required" class="form-control" placeholder=" Weight " />
                        </div>

                    </div>
                    <div class=" row" id="landsection">
                        <div class="form-group col-md-4">
                            <label class="control-label">Origin</label>
                            <input maxlength="100" type="text" id="Origin_land" required="required" class="form-control" placeholder=" origin" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Destination</label>
                            <input maxlength="100" type="text" id="Destination_land" required="required" class="form-control" placeholder=" destination" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="date">ETD</label>
                            <input maxlength="100" type="text" id="etd_land" name="date" required="required" class="form-control" placeholder=" ETD" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="date">ETA</label>

                            <input maxlength="100" type="text" id="eta_land" name="date" required="required" class="form-control" placeholder=" ETA" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Carrier</label>
                            <!-- <input maxlength="100" type="text" id="Carrier_land" required="required" class="form-control" placeholder=" Carrier" /> -->
                            <select class="form-control" name="Carrier_land" id="Carrier_land" value="--Select Type--">
                                <option value="select">--Select Type--</option>
                                <?php

                                foreach ($carrierlist as $carrier) {
                                    if ($carrier->carrier_type == "Land") {
                                        echo '<option value="' . $carrier->name . '" id="' . $carrier->id . '">' . $carrier->name . '&nbsp;' . $carrier->code . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">PO no. </label>
                            <input maxlength="100" type="text" id="PoNo_land" required="required" class="form-control" placeholder=" PO no." />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label"> MAWB </label>
                            <input maxlength="100" type="text" id="Mawb_land" required="required" class="form-control" placeholder="MAWB" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">No_pcs</label>
                            <input maxlength="100" type="text" id="Nopcs_land" required="required" class="form-control" placeholder="no_pcs " />
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">Chargeable Weight </label>
                            <input maxlength="100" type="text" id="ChargeableWeight_land" required="required" class="form-control" placeholder=" Weight " />
                        </div>
                    </div>
                    <div class=" row">

                        <div class="form-group col-md-4">
                            <label class="control-label">BAYAN No.</label>
                            <input maxlength="100" type="text" id="BayanNo" required="required" class="form-control" placeholder="BAYAN number" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">BAYAN Date</label>
                            <input class="form-control" id="BayanDate" name="date" placeholder="MM/DD/YYY" type="text" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputname1">Status</label>
                            <select class="form-control" id="Status" name="status" value="--Select Type--">
                                <option value="bank">--Select Type--</option>
                                <option value="OPEN">OPEN</option>
                                <option value="CLOSED">CLOSED</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Job Status</label>
                            <input maxlength="100" type="text" id="JobStatus" required="required" class="form-control" placeholder="job status" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputname1">POP</label>
                            <select class="form-control" id="PoP" name="pop" value="--Select Type--">
                                <option value="bank">--Select Type--</option>
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputname1">Lab Undertaking</label>
                            <select class="form-control" id="LabUndertaking" name="lab_understanding" value="--Select Type--">
                                <option value="bank">--Select Type--</option>
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputname1">Docs Guarantee</label>
                            <select class="form-control" id="DocsGuarantee" name="docs_guarantee" value="--Select Type--">
                                <option value="bank">--Select Type--</option>
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Description</label>
                            <input maxlength="100" type="text" id="Description" required="required" class="form-control" placeholder="description" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputname1">Salesman</label>
                            <select class="form-control" id="salesman" name="salesman" value="">
                                <option value="select">--Select Type--</option>
                                <?php

                                foreach ($userlist as $user) {
                                    echo '<option value="' . $user->user_name . '">' . $user->user_name . '</option>';
                                }
                                ?>

                            </select>
                        </div>
                         &nbsp;  <button class="btn btn-success" onclick="update(); jobdetails(); " id="jobsubmit" type="button">Submit</button>
                    </div>
                  
                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button> 
                    
                </div>
            </div>
         </div>
            <div class="col-md-12 ">
                <div class="panel panel-primary setup-content " id="step-3">
                    <div class="panel-heading">
                        <h3 class="panel-title">Consignment</h3>
                    </div>
                    <div class="panel-body">
                        <section class="content">

                            <div class="col-md-10">
                                <h4 class="box-title">Job</h4>
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <div class="box-body">

                                            <div class="form-group col-md-1">

                                                <input type="hidden" id="estimate_code" name="code" class="form-control" placeholder="<?php echo $codes[0]->estimate_no + 1; ?>" readonly="readonly" value="<?php echo $codes[0]->estimate_no + 1; ?>">

                                                <label class="control-label">Code</label>
                                                <input maxlength="100" onchange="getdata();" type="text" id="desc_code" class="form-control" placeholder=" code" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="control-label">Description</label>
                                                <input maxlength="100" type="text" id="description_job" class="form-control" placeholder=" Description" value="" />
                                                <input type="hidden" id="description_id" class="form-control" value="<?php echo $values[0]->JobId; ?>" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="control-label">Unit Price</label>
                                                <input maxlength="100" type="text" id="unitprice" class="form-control " placeholder=" unit price" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="control-label">Currency</label>
                                                <select class="form-control" id="unit_price" name="unit_price" value="--Select Type--">
                                                    <option value="bank">--Select Type--</option>
                                                    <?php

                                                    foreach ($currencylist as $currency) {
                                                        echo '<option value="' . $currency->currency . '" id="' . $currency->id . '">' . $currency->currency . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="control-label">Conv.Factor</label>
                                                <input maxlength="100" type="text" id="conv_factor" class="form-control " placeholder=" conv.factor" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="control-label">Quantity</label>
                                                <input maxlength="100" type="text" id="quantity" class="form-control " placeholder=" quantity" />
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label class="control-label">VAT</label>
                                                <input maxlength="100" type="text" id="vat" class="form-control" placeholder=" vat" />
                                            </div>

                                            <input type="submit" name="add" value="ADD" id="add" class="btn btn-success" style="float: right;">
                                        </div>
                                        <div class="col-md-12">
                                            <div>
                                                <!-- /.box-header -->
                                                <div class="">
                                                    <div id="ContentPlaceHolder1_upDataList">

                                                        <table id="datatable" class="table table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Description</th>
                                                                    <th>UnitPrice</th>
                                                                    <th>Quantity</th>
                                                                    <th>SubTotal</th>
                                                                    <th>VAT</th>
                                                                    <th>TOTAL</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="dataadd">

                                                            </tbody>
                                                            <tfoot>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                    <div id="ContentPlaceHolder1_upTotals">
                                                        <div style="float: right;">
                                                            <span id="ContentPlaceHolder1_lbl">TOTAL</span>
                                                            <input name="total" type="text" value="" readonly="readonly" id="total" class="form-control " style="width: 100%;">
                                                            <span id="ContentPlaceHolder1_Label1">Vat Total</span>
                                                            <input name="vat_total" type="text" value="" readonly="readonly" id="vat_total" class="form-control " style="width: 100%;">
                                                            <span id="ContentPlaceHolder1_Label2">Grand Total</span>
                                                            <input name="grand_total" type="text" value="" readonly="readonly" id="grand_total" class="form-control " style="width: 100%;">
                                                        </div>
                                                    </div>
                                                    <!-- /.box-body -->
                                                </div>
                                                <!-- /.box -->

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="col-md-2">
                                <h4 class="box-title">Job Description </h4>
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                    </div>
                                    <div class="box-body">
                                        <strong><i class=""></i> Job</strong>
                                        <p class="text-dark" id="job_code">
                                        </p>
                                        <hr>
                                        <strong><i class=""></i> Shipper</strong>
                                        <p class="text-dark" id="shipper_name"> </p>
                                        <hr>
                                        <strong><i class=""></i> Consignee</strong>
                                        <p class="text-dark" id="consignee_name"> </p>
                                        <hr>
                                        <strong><i class=""></i> Client Company</strong>
                                        <p class="text-dark" id="company_name"> </p>
                                        <hr>
                                        <strong><i class=""></i> Shipment Terms</strong>
                                        <p class="text-dark" id="shpmnt_terms"> </p>
                                        <hr>
                                        <strong><i class=""></i> Consignment description</strong>
                                        <p class="text-dark" id="consign_desc"> </p>
                                    
                                    </div>

                                </div>
                                <input type="submit" name="submit" onclick="add_estimate();" value="Submit" id="submit" class="btn btn-success">
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button> 

                    </div>
                </div>
            </div>
       


             
        <div class="col-md-11 ">
        <div class="panel panel-primary setup-content" id="step-4" >
            <div class="panel-heading">
                 <h3 class="panel-title">Job Details</h3>
            </div>
            <div class="panel-body">
            <div class=" row">
            <div class="form-group  col-md-12">
                    < <label class="control-label ">View Job Details</label><br><br> 
                  
                   
           
                </div>
              </div>

                     <button class="btn btn-success pull-right" type="submit">Finish!</button>
            </div> 
        </div></div>


</form>
</div>



<script src="<?php echo base_url(); ?>/assets/js/moment.js"></script>
<script src="<?php echo base_url(); ?>/assets/user_scripts/transaction/job_script.js"></script>
<!-- <script src="<?php echo base_url(); ?>/assets/user_scripts/transaction/plannes_script.js"></script> -->
<script src="<?php echo base_url(); ?>/assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#jobsubmit').click(function() {
            update();
        });
    });



    //show selected div only 
    $(document).ready(function() {
        $('#air').click(function() {
            add("air");
            hideall();
            // alert("air");
            $('#airsection').removeClass("hidden");

        });
        $('#sea').click(function() {
            add("sea");
            hideall();
            // alert("sea");
            $('#seasection').removeClass("hidden");

        });
        $('#transportation').click(function() {
            add("transportation");
            hideall();
            $('#transportationsection').removeClass("hidden");

        });
        $('#land').click(function() {
            add("land");
            hideall();
            $('#landsection').removeClass("hidden");

        });
    });

    //hide all div
    function hideall() {
        $('#airsection').addClass("hidden");
        $('#seasection').addClass("hidden");
        $('#transportationsection').addClass("hidden");
        $('#landsection').addClass("hidden");
        //     $('#othersection').addClass("hidden");
    }
</script>
<script>
    //date picker
    $(document).ready(function() {
        var date_input = $('input[name="date"]'); //our date input has the name "date"
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        var options = {
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);



    })
</script>
<script type="text/javascript">
    $(document).ready(function() {


        var obj = [];
        $.ajax({
            url: "<?php echo base_url(); ?>transaction/Transaction/getshipperdata",
            type: 'post',
            dataType: "json",
            success: function(data) {
                console.log(data);
                obj = data;
                $('#shippername').autocomplete({
                    source: obj,
                    select: function(event, ui) {
                        $("#shippername").val(ui.item.label);
                        $("#shipperid").val(ui.item.value);
                        return false;

                    }
                });
            }
        });

        //var obj=[{"value":1,"label":'anu'},{"value":2,"label":'rejina'}];

    });
</script>

<script type="text/javascript">
    //autocomplete textbox
    $(document).ready(function() {


        var obj = [];
        $.ajax({
            url: "<?php echo base_url(); ?>transaction/Transaction/getconsigneedata",
            type: 'post',
            dataType: "json",
            success: function(data) {
                console.log(data);
                obj = data;
                $('#consigneename').autocomplete({
                    source: obj,
                    select: function(event, ui) {
                        $("#consigneename").val(ui.item.label);
                        $("#consignor_id").val(ui.item.value);
                        return false;

                    }
                });
            }
        });





    });

    $(function() {

        $("#add").click(function() {

            if ($('#unitprice,#unit_price,#conv_factor,#quantity,#vat').val() == '') {
                alert('Insert all fields');
            } else {
                insertRow();
            }
        });

    });
    $(document).on("click", '.rmvbutton', function() {

        $(this).closest("tr").remove();
        calculates();
        return false;
    });

    function insertRow() {

        var descID = 0;
        var desc = $("#description_job").val();
        var price = parseFloat($("#unitprice").val());
        var price1 = parseFloat($("#unitprice").val());
        var conv_factor = parseFloat($("#conv_factor").val());
        var price = price * conv_factor;

        var quantity = parseFloat($("#quantity").val());
        var vatAmount = parseFloat($("#vat").val());
        var SubTotal = quantity * price;
        var taxvalue = ((SubTotal * vatAmount) / 100);
        var total = SubTotal + taxvalue;
        var unit_val = $("#unit_price").val();
        var desc_id = $("#description_id").val();

        $(".dataadd").append("<tr class='estmt_details'><td class='desc'>" + desc + " </td> <td class='price_val'>" + price1 + "</td> <td class='quanty'>" + quantity + "</td> <td class='subtotalval_data'>" + SubTotal + "</td> <td class='taxval_data'>" + taxvalue + "</td>  <td class='totalval_data'>" + total + "</td> <td class='hidden unittype'>" + unit_val + "</td><td class='hidden convfact'>" + conv_factor + "</td><td class='hidden desc_id'>" + desc_id + "</td><td><a class='rmvbutton'><i class='fa fa-trash-o'></i></a></td>  </tr>");

        calculates();


    }

    //total

    function calculates() {
        var totsub_val = 0;
        $(".subtotalval_data").each(function(td) {
            var s = parseFloat($(this).html());
            totsub_val = parseFloat(totsub_val) + s;
        });

        var taxval_data_val = 0;
        $(".taxval_data").each(function(td) {
            var s = parseFloat($(this).html());
            taxval_data_val = parseFloat(taxval_data_val) + s;
        });

        var totalval_data_val = 0;
        $(".totalval_data").each(function(td) {
            var s = parseFloat($(this).html());
            totalval_data_val = parseFloat(totalval_data_val) + s;
        });


        $("#total").val(totsub_val.toFixed(2));

        $("#vat_total").val(taxval_data_val.toFixed(2));
        $("#grand_total").val(totalval_data_val.toFixed(2));


    }
</script>