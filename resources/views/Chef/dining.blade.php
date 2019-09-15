@extends('Partials.master')
@section('content')

    <div class="row" style="background: beige">
        <form class="form-horizontal" style="color: black">

            <div class="col-md-1"></div>

            <div class="panel panel-info col-md-4" style="background: #c9e2b3">
                <h1 class="text-center">Create Dining</h1>
                <hr>

                    <fieldset>

                        <div class="form-group">
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <label for="name" class="control-label" style="font-size: 15px">Dining For</label>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-control" id="select">
                                    <option>Breakfast</option>
                                    <option>Lunch</option>
                                    <option>Snacks</option>
                                    <option>Dinner</option>

                                </select>
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <label for="name" class="control-label" style="font-size: 15px">Day</label>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-control" id="day" multiple size=5>
                                    <option>Sunday</option>
                                    <option>Monday</option>
                                    <option>Tuesday</option>
                                    <option>Wednesday</option>
                                    <option>Thursday</option>
                                    <option>Friday</option>
                                    <option>Saturday</option>
                                    <option>Everyday</option>

                                </select>
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <label for="name" class="control-label" style="font-size: 15px">End Time</label>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-control" id="select">
                                    <option>10 Am</option>
                                    <option>11 Am</option>
                                    <option>12 Pm</option>
                                    <option>1 Pm</option>
                                    <option>2 Pm</option>
                                    <option>3 Pm</option>
                                    <option>4 Pm</option>
                                    <option>5 Pm</option>
                                    <option>6 Pm</option>
                                </select>
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <label for="name" class="control-label" style="font-size: 15px">Max Order</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="number" class="form-control">
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <label for="name" class="control-label" style="font-size: 15px">Plate Price</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="number" class="form-control">
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                    </fieldset>

            </div>

            <div class="col-md-1"></div>

            <div class="panel panel-info col-md-4" style="background: #c9e2b3">
                <h1 class="text-center">Select Menu</h1>
                <hr>
                    <fieldset>
                        <button class="btn btn-primary btn-xs col-md-offset-10" id="addItem">Add Item</button>

                        <div class="form-group">
                            <div class="col-md-12">

                                <div class="col-md-5">
                                    <label for="name" id="itemLbl" class="control-label" style="font-size: 15px">Item</label>
                                </div>
                                <div class="col-md-7">
                                    <select class="form-control" id="selectItem">
                                        <option>Breakfast</option>
                                        <option>Lunch</option>
                                        <option>Snacks</option>
                                        <option>Dinner</option>

                                    </select>
                                </div>

                            </div>
                        </div>




                    </fieldset>


            </div>

            <div class="col-md-2"></div>

            <div class="form-group col-md-12">
                <div class="col-lg-offset-9">
                    <button type="reset" class="btn btn-default" style="font-size: 20px">Cancel</button>
                    <button type="submit" name="LogIn" class="btn btn-primary" style="font-size: 20px">Create</button>
                </div>
            </div>


        </form>

    </div>

    <script>
        
    </script>

@endsection
