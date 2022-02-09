<div class="page-title" id="dashboard" data-superior="<?php echo $found_user->LastName.','.$found_user->FirstName; ?>">
    <h3>Dashboard</h3>
    <p class="text-subtitle text-muted">Curing Barn Monitoring Dashboard</p>
</div>
 <!-- Multiple choices start -->
 <section id="content-types">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="collapse-icon accordion-icon-rotate">
                <div class="accordion" id="cardAccordion">
                    <div class="card">
                        <div class="card-header bg-light" id="headingOne" data-bs-toggle="collapse"
                            data-bs-target="#collapseFilter" aria-expanded="false"
                            aria-contols="collapseFilter" role="button">
                            <span class="collapsed card-title text-white">Filter Options</span>
                        </div>
                        <div id="collapseFilter" class="collapse pt-1" aria-labelledby="headingOne"
                            data-parent="#cardAccordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Farmer Name</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select class="choices form-select" id="farmer-name-filter">
                                            <?php
                                                $data = Dynaset::load("Select Name From tblULFS Where BackOut = 0 and ApprovalStatus = 'APPROVED' AND ProjectManager Like '%PEREZ%'");
                                                while($row = mssql_fetch_assoc($data)){
                                                    echo "<option value=\"{$row['Name']}\">{$row['Name']}</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Harvesting Date</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select name="harvesting-date-filter" class="choices form-select" id="harvesting-date-filter">
                                            <option value="%">ALL</option>
                                            <?php
                                                
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" id="filter" class="btn btn-primary me-1 mb-1">Apply Filter</button>
                                        <button type="reset" id="clear" class="btn btn-light-secondary me-1 mb-1">Clear</button>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Table Farmer Records -->
<div class="row" id="table-inverse">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Farmer Records</h4>
            </div>
            <div class="card-content">
                <table class="table table-light mb-0" id="table1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Farm Address</th>
                            <th>Harvesting Date</th>
                            <th>Monitoring Date</th>
                            <th>Curing Stage</th>
                            <th>Rain Fall Reading </th>
                        </tr>
                    </thead>
                    <tbody id="searchable">
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- modal encoding form -->
<div class="modal fade text-left modal-borderless" id="encoding-modal-form"
    tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Curing Barn Monitoring</h5>
                <button type="button" class="close rounded-pill"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="farmer-name">Name Of Farmer</label>
                            <input class="form-control" id="farmer-name" readonly="readonly" ></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label for="farm-address">Farm Address</label>
                            <input class="form-control" id="farm-address" readonly="readonly" ></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label for="curing-barn-number">Curing Barn ID</label>
                            <select class="choices form-select form-control" id="curing-barn-number" style="height: 10px !important;">
                                <option value="%">--Select--</option>
                                <optgroup label="Control">
                                <option value="Control-CB 1">Control-CB 1</option>
                                <option value="Control-CB 2">Control-CB 2</option>
                                <option value="Control-CB 3">Control-CB 3</option>
                              </optgroup>
                              <optgroup label="Trial 1">
                                <option value="Trial 1-CB 1">Trial 1-CB 1</option>
                                <option value="Trial 1-CB 2">Trial 1-CB 2</option>
                              </optgroup>
                              <optgroup label="Trial 2">
                                <option value="Trial 2-CB 1">Trial 2-CB 1</option>
                                <option value="Trial 2-CB 2">Trial 2-CB 2</option>
                              </optgroup>
                              <optgroup label="Trial 3">
                                <option value="Trial 3-CB 1">Trial 3-CB 1</option>
                                <option value="Trial 3-CB 2">Trial 3-CB 2</option>
                              </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <label for="number-of-stalks">Number of Stalks</label>
                            <input type="number" style="70px !important;" id="number-of-stalks" class="form-control" min="0" step="1" data-bind="value:replyNumber" name="rain-fall-mm">
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="harvesting-date">Harvesting Date</label>
                            <input type="date" class="form-control" name="harvesting-date" id="harvesting-date"></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="country-floating">Monitoring Date</label>
                            <input type="date" id="monitoring-date" class="form-control" name="monitoring-date"
                                placeholder="Monitoring Date">
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="number-days-cb">Number of Days in CB</label>
                            <input type="number" id="number-days-cb" class="form-control" min="0" data-bind="value:replyNumber" name="number-days-cb" readonly>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="form-group">
                            <label for="">Curing Stage</label>
                            <ul class="list-unstyled mb-0">
                                <li class="d-inline-block me-2 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1" value="Yellow Stage" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Yellow Stage
                                        </label>
                                    </div>
                                </li>
                                <li class="d-inline-block me-2 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault2" value="Lamina Dying">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Lamina Dying
                                        </label>
                                    </div>
                                </li>
                                <li class="d-inline-block me-2 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault3" value="Stem Dying">
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            Stem Dying
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="">Time of Monitoring</label>
                            <fieldset>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">8:00 am</span>
                                    </div>
                                    <input type="number" aria-label="Dry bulb" class="form-control"
                                        id="dry-bulb-8am" placeholder="Dry Bulb" min="0" step="1" data-bind="value:replyNumber">
                                    <input type="number" aria-label="Wet bulb" class="form-control"
                                        id="wet-bulb-8am" placeholder="Wet Bulb" min="0" step="1" data-bind="value:replyNumber">
                                    <input type="number" aria-label="Point spread" class="form-control"
                                        id="point-spread-8am" placeholder="Point Spread" min="0" step="1" data-bind="value:replyNumber">
                                    <input type="text" aria-label="Action Plan" class="form-control"
                                        id="action-plan-8am" placeholder="Action Plan" min="0" step="1" data-bind="value:replyNumber">
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">1:00 pm</span>
                                    </div>
                                    <input type="number" aria-label="Dry Bulb" class="form-control"
                                        id="dry-bulb-1pm" placeholder="Dry Bulb" min="0" step="1" data-bind="value:replyNumber">
                                    <input type="number" aria-label="Wet bulb" class="form-control"
                                        id="wet-bulb-1pm" placeholder="Wet Bulb" min="0" step="1" data-bind="value:replyNumber">
                                    <input type="number" aria-label="Point spread" class="form-control"
                                        id="point-spread-1pm" placeholder="Point Spread" min="0" step="1" data-bind="value:replyNumber">
                                    <input type="text" aria-label="Action Plan" class="form-control"
                                        id="action-plan-1pm" placeholder="Action Plan" min="0" step="1" data-bind="value:replyNumber">
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">4:00 pm</span>
                                    </div>
                                    <input type="number" aria-label="Dry bulb" class="form-control"
                                        id="dry-bulb-4pm" placeholder="Dry Bulb" min="0" step="1" data-bind="value:replyNumber">
                                    <input type="number" aria-label="Wet bulb" class="form-control"
                                        id="wet-bulb-4pm" placeholder="Wet Bulb" min="0" step="1" data-bind="value:replyNumber">
                                    <input type="number" aria-label="Point spread" class="form-control"
                                        id="point-spread-4pm" placeholder="Point Spread" min="0" step="1" data-bind="value:replyNumber">
                                    <input type="text" aria-label="Action Plan" class="form-control"
                                        id="action-plan-4pm" placeholder="Action Plan" min="0" step="1" data-bind="value:replyNumber">
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="rain-fall-mm">Rain Fall (MM)</label>
                            <input type="number" id="rain-fall-mm" class="form-control" min="0" step="1" data-bind="value:replyNumber" name="rain-fall-mm">
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" id="add-summary" class="btn btn-primary me-1 mb-1">Add</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="divider">
                            <div class="divider-text">Summary</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="alert alert-warning">
                            <h4 class="alert-heading">You have unsaved data.</h4>
                            <p>Some of the summary data may not appear on the Farmer Record. Click Save button to upload unsaved data.</p>
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered  table-light mb-0">
                                <thead class="thead-dark">
                                    <tr>
                                        <th rowspan="2">Monitoring Date</th>
                                        <th rowspan="2">CB Number </th>
                                        <th rowspan="2">Number of days in CB</th>
                                        <th rowspan="2">Curing Stage</th>
                                        <th colspan="4" style="text-align: center;">Time of Monitoring (8:00am)</th>
                                        <th colspan="4" style="text-align: center;">Time of Monitoring (1:00pm)</th>
                                        <th colspan="4" style="text-align: center;">Time of Monitoring (4:00pm)</th>
                                    </tr>
                                    <tr>
                                        <th>Dry Bulb</th>
                                        <th>Wet Bulb</th>
                                        <th>Point Spread</th>
                                        <th>Action Plan</th>
                                        <th>Dry Bulb</th>
                                        <th>Wet Bulb</th>
                                        <th>Point Spread</th>
                                        <th>Action Plan</th>
                                        <th>Dry Bulb</th>
                                        <th>Wet Bulb</th>
                                        <th>Point Spread</th>
                                        <th>Action Plan</th>
                                    </tr>
                                </thead>
                                <tbody id="tbl-summary-report">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="button" class="btn btn-primary ml-1"
                    data-bs-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block" id="save-button">Save</span>
                </button>
            </div>
        </div>
    </div>
</div>
