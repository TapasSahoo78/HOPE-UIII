@extends('admin.layouts.app', ['withOutHeaderSidebar' => true])

@section('content')
    <div class="col-sm-12 col-lg-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Horizontal Form</h4>
                </div>
            </div>
            <div class="card-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac venenatis mollis, diam
                    nibh finibus leo</p>
                <form class="form-horizontal">
                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Email:</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email1" placeholder="Enter Your  email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="pwd2">Password:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="pwd2" placeholder="Enter Your password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Remember me
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="submit" class="btn btn-danger">cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Form row</h4>
                </div>
            </div>
            <div class="card-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac venenatis mollis, diam
                    nibh finibus leo</p>
                <form>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="First name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Last name">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Input</h4>
                </div>
            </div>
            <div class="card-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac venenatis mollis, diam
                    nibh finibus leo</p>
                <form>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputDisabled1">Disabled Input</label>
                        <input type="text" class="form-control" id="exampleInputDisabled1" disabled=""
                            value="Mark Jhon">
                    </div>
                </form>
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac venenatis mollis,
                        diam nibh finibus leo</p>
                    <form class="form-horizontal">
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="email">Email:</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" placeholder="Enter Your  email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="pwd1">Password:</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="pwd1"
                                    placeholder="Enter Your password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                                <label class="form-check-label" for="flexCheckDefault1">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-danger">cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Form row</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label" for="exampleInputReadonly">Readonly</label>
                    <input type="text" class="form-control" id="exampleInputReadonly" readonly=""
                        value="Mark Jhon">
                </div>
                <div class="form-group">
                    <label class="form-label" for="exampleInputcolor">Input Color </label>
                    <input type="color" class="form-control" id="exampleInputcolor" value="#50b5ff">
                </div>
                <div class="form-group">
                    <label class="form-label" for="exampleFormControlSelect1">Select Input</label>
                    <select class="form-select" id="exampleFormControlSelect1">
                        <option selected="" disabled="">Select your age</option>
                        <option>0-18</option>
                        <option>18-26</option>
                        <option>26-46</option>
                        <option>46-60</option>
                        <option>Above 60</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="choices-single-default">Select Input New</label>
                    <select class="form-select" data-trigger="" name="choices-single-default"
                        id="choices-single-default">
                        <option value="">This is a placeholder</option>
                        <option value="Choice 1">Choice 1</option>
                        <option value="Choice 2">Choice 2</option>
                        <option value="Choice 3">Choice 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="choices-multiple-default">Default</label>
                    <select class="form-select" data-trigger="" name="choices-multiple-default"
                        id="choices-multiple-default" multiple="">
                        <option value="Choice 1" selected="">Choice 1</option>
                        <option value="Choice 2">Choice 2</option>
                        <option value="Choice 3">Choice 3</option>
                        <option value="Choice 4" disabled="">Choice 4</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="exampleFormControlSelect2">Example multiple select</label>
                    <select multiple="" class="form-select" id="exampleFormControlSelect2">
                        <option>select-1</option>
                        <option>select-2</option>
                        <option>select-3</option>
                        <option>select-4</option>
                        <option>select-5</option>
                        <option>select-6</option>
                        <option>select-7</option>
                        <option>select-8</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="customRange1">Range Input</label>
                    <input type="range" class="form-range" id="customRange1">
                </div>
                <div class="form-group">
                    <div class="form-check d-block">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
                        <label class="form-check-label" for="flexCheckDefault11">
                            Default checkbox
                        </label>
                    </div>
                    <div class="form-check d-block">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked11"
                            checked="">
                        <label class="form-check-label" for="flexCheckChecked11">
                            Checked checkbox
                        </label>
                    </div>
                    <div class="form-check d-block">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled"
                            disabled="">
                        <label class="form-check-label" for="flexCheckDisabled">
                            Disabled checkbox
                        </label>
                    </div>
                    <div class="form-check d-block">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled"
                            checked="" disabled="">
                        <label class="form-check-label" for="flexCheckCheckedDisabled">
                            Disabled checked checkbox
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check d-block">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Default radio
                        </label>
                    </div>
                    <div class="form-check d-block">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                            checked="">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Default checked radio
                        </label>
                    </div>
                    <div class="form-check d-block">
                        <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled"
                            disabled="">
                        <label class="form-check-label" for="flexRadioDisabled">
                            Disabled radio
                        </label>
                    </div>
                    <div class="form-check d-block">
                        <input class="form-check-input" type="radio" name="flexRadioDisabled"
                            id="flexRadioCheckedDisabled" checked="" disabled="">
                        <label class="form-check-label" for="flexRadioCheckedDisabled">
                            Disabled checked radio
                        </label>
                    </div>
                    <div class="form-check form-radio">
                        <input type="radio" id="customRadio5" name="customRadio5" class="form-check-input"
                            disabled="" checked="">
                        <label class="form-check-label" for="customRadio5"> Selected and disabled radio</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadio6" name="customRadio1" class="custom-control-input">&nbsp;
                        <label class="custom-control-label" for="customRadio6"> Default radio</label>
                    </div>
                    <div class="form-group">
                        <div class="form-check d-block">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                            <label class="form-check-label" for="flexCheckDefault2">
                                Default checkbox
                            </label>
                        </div>
                        <div class="form-check d-block">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                checked="">
                            <label class="form-check-label" for="flexCheckChecked">
                                Checked checkbox
                            </label>
                        </div>
                        <div class="form-check d-block">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled1"
                                disabled="">
                            <label class="form-check-label" for="flexCheckDisabled1">
                                Disabled checkbox
                            </label>
                        </div>
                        <div class="form-check d-block">
                            <input class="form-check-input" type="checkbox" value=""
                                id="flexCheckCheckedDisabled11" checked="" disabled="">
                            <label class="form-check-label" for="flexCheckCheckedDisabled11">
                                Disabled checked checkbox
                            </label>
                        </div>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadio8" name="customRadio6" class="custom-control-input"
                            checked="">&nbsp;
                        <label class="custom-control-label" for="customRadio8"> Selected radio</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadio9" name="customRadio7" class="custom-control-input"
                            disabled="">&nbsp;
                        <label class="custom-control-label" for="customRadio9"> disabled radio</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadio10" name="customRadio8" class="custom-control-input"
                            disabled="" checked="">&nbsp;
                        <label class="custom-control-label" for="customRadio10"> Selected and disabled radio</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                    </div>
                    <div class="form-group">
                        <label for="customFile1" class="form-label custom-file-input">Choose file</label>
                        <input class="form-control" type="file" id="customFile1">
                    </div>
                </div>
                <div class="form-group">
                    <label for="customFile" class="form-label custom-file-input">Example file input</label>
                    <input class="form-control" type="file" id="customFile">
                </div>
                <div class="form-group">
                    <label for="customFile2" class="form-label custom-file-input">Choose file</label>
                    <input class="form-control" type="file" id="customFile2">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="submit" class="btn btn-danger">cancel</button>
            </div>
        </div>
    </div>
@endsection
