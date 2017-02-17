<!DOCTYPE html>
<html class='no-js' lang='en'>

<head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title>Forms</title>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link href="css/application.css" rel="stylesheet" type="text/css" />
    <script type="text/css" src="{!! asset('bower_components/font-awesome/css/font-awesome.min.css') !!}"></script>
    <link href="assets/images/favicon.ico" rel="icon" type="image/ico" />
</head>

<body class='main page'>
    <!-- Navbar -->
    <div class='navbar navbar-default' id='navbar'>
        <a class='navbar-brand' href='#'>
            <i class='icon-beer'></i> Hierapolis
        </a>
        <ul class='nav navbar-nav pull-right'>
            <li class='dropdown'>
                <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                    <i class='icon-envelope'></i> Messages
                    <span class='badge'>5</span>
                    <b class='caret'></b>
                </a>
                <ul class='dropdown-menu'>
                    <li>
                        <a href='#'>New message</a>
                    </li>
                    <li>
                        <a href='#'>Inbox</a>
                    </li>
                    <li>
                        <a href='#'>Out box</a>
                    </li>
                    <li>
                        <a href='#'>Trash</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href='#'>
                    <i class='icon-cog'></i> Settings
                </a>
            </li>
            <li class='dropdown user'>
                <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                    <i class='icon-user'></i>
                    <strong>John DOE</strong>
                    <img class="img-rounded" src="http://placehold.it/20x20/ccc/777" />
                    <b class='caret'></b>
                </a>
                <ul class='dropdown-menu'>
                    <li>
                        <a href='#'>Edit Profile</a>
                    </li>
                    <li class='divider'></li>
                    <li>
                        <a href="/">Sign out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div id='wrapper'>
        <!-- Sidebar -->
        <section id='sidebar'>
            <i class='icon-align-justify icon-large' id='toggle'></i>
            <ul id='dock'>
                <li class='launcher'>
                    <i class='icon-dashboard'></i>
                    <a href="dashboard.html">Dashboard</a>
                </li>
                <li class='active launcher'>
                    <i class='icon-file-text-alt'></i>
                    <a href="forms.html">Forms</a>
                </li>
                <li class='launcher'>
                    <i class='icon-table'></i>
                    <a href="tables.html">Tables</a>
                </li>
                <li class='launcher dropdown hover'>
                    <i class='icon-flag'></i>
                    <a href='#'>Reports</a>
                    <ul class='dropdown-menu'>
                        <li class='dropdown-header'>Launcher description</li>
                        <li>
                            <a href='#'>Action</a>
                        </li>
                        <li>
                            <a href='#'>Another action</a>
                        </li>
                        <li>
                            <a href='#'>Something else here</a>
                        </li>
                    </ul>
                </li>
                <li class='launcher'>
                    <i class='icon-bookmark'></i>
                    <a href='#'>Bookmarks</a>
                </li>
                <li class='launcher'>
                    <i class='icon-cloud'></i>
                    <a href='#'>Backup</a>
                </li>
                <li class='launcher'>
                    <i class='icon-bug'></i>
                    <a href='#'>Feedback</a>
                </li>
            </ul>
            <div data-toggle='tooltip' id='beaker' title='Made by lab2023'></div>
        </section>
        <!-- Tools -->
        <section id='tools'>
            <ul class='breadcrumb' id='breadcrumb'>
                <li class='title'>Forms</li>
                <li><a href="#">Lorem</a></li>
                <li class='active'><a href="#">ipsum</a></li>
            </ul>
            <div id='toolbar'>
            </div>
        </section>
        <!-- Content -->
        <div id='content'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <i class='icon-edit icon-large'></i> Form Default
                </div>
                <div class='panel-body'>
                    <form>
                        <fieldset>
                            <legend>Default Inputs</legend>
                            <div class='form-group'>
                                <label class='control-label'>Text field</label>
                                <input class='form-control' placeholder='Enter username' type='text'>
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>Password field</label>
                                <input class='form-control' placeholder='Enter password' type='password'>
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>Input field with help</label>
                                <input class='form-control' placeholder='.help-block'>
                                <p class='help-block'>Example block-level help text here.</p>
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>Disabled field</label>
                                <input class='form-control' disabled placeholder='This is field is disabled!'>
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>Tooltip field</label>
                                <input class='form-control' data-toggle='tooltip' placeholder='This is field is disabled!' title='Input tips here'>
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>Textarea field</label>
                                <textarea class='form-control' rows='4'></textarea>
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>File input</label>
                                <input type='file'>
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>Large field</label>
                                <input class='form-control input-lg' placeholder='.input-lg' type='text'>
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>Small field</label>
                                <input class='form-control input-sm' placeholder='.input-sm' type='text'>
                            </div>
                            <div class='form-group row'>
                                <div class='col-lg-2'>
                                    <label class='control-label'>Column sizing</label>
                                    <input class='form-control' placeholder='.col-lg-2' type='text'>
                                </div>
                                <div class='col-lg-3'>
                                    <label class='control-label'>Column sizing</label>
                                    <input class='form-control' placeholder='.col-lg-3' type='text'>
                                </div>
                                <div class='col-lg-7'>
                                    <label class='control-label'>Column sizing</label>
                                    <input class='form-control' placeholder='.col-lg-7' type='text'>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Input Validation States</legend>
                            <div class='form-group has-warning'>
                                <label class='control-label'>Input field with help</label>
                                <input class='form-control' placeholder='.has-warning'>
                                <p class='help-block'>Example block-level help text here.</p>
                            </div>
                            <div class='form-group has-error'>
                                <label class='control-label'>Input field with help</label>
                                <input class='form-control' placeholder='.has-error'>
                                <p class='help-block'>Example block-level help text here.</p>
                            </div>
                            <div class='form-group has-success'>
                                <label class='control-label'>Input field with help</label>
                                <input class='form-control' placeholder='.has-success'>
                                <p class='help-block'>Example block-level help text here.</p>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Checkboxes and radios</legend>
                            <div class='form-group'>
                                <label class='control-label'>Checkbox</label>
                                <div class='checkbox'>
                                    <input type='checkbox' value=''> Option one is this and that&mdash;be sure to include
                                    why it's great
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>Inline checkbox</label>
                                <br>
                                <div class='checkbox-inline'>
                                    <input type='checkbox' value=''> 1
                                </div>
                                <div class='checkbox-inline'>
                                    <input type='checkbox' value=''> 2
                                </div>
                                <div class='checkbox-inline'>
                                    <input type='checkbox' value=''> 3
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>Radio</label>
                                <div class='radio'>
                                    <input checked name='options_radio' type='radio' value='option1'> Option one is this
                                    and that&mdash;be sure to include why it's great
                                    <br>
                                    <input checked name='options_radio' type='radio' value='option2'> Option two can be something
                                    else and selecting it will deselect option one
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Selects</legend>
                            <div class='form-group'>
                                <label class='control-label'>Single select</label>
                                <select class='form-control'>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>Multiple select</label>
                                <select class='form-control' multiple>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                            </div>
                        </fieldset>
                        <div class='form-actions'>
                            <button class='btn btn-default' type='submit'>Submit</button>
                            <a class='btn' href='#'>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <i class='icon-edit icon-large'></i> Form Horizontal
                </div>
                <div class='panel-body'>
                    <form class='form-horizontal'>
                        <fieldset>
                            <legend>Default inputs</legend>
                            <div class='form-group'>
                                <label class='col-lg-2 control-label'>Text field</label>
                                <div class='col-lg-10'>
                                    <input class='form-control' placeholder='Enter username' type='text'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-lg-2 control-label'>Password field</label>
                                <div class='col-lg-10'>
                                    <input class='form-control' placeholder='Enter password' type='password'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-lg-2 control-label'>Input field with help</label>
                                <div class='col-lg-10'>
                                    <input class='form-control' placeholder='.help-block'>
                                    <p class='help-block'>Example block-level help text here.%fieldset</p>
                                </div>
                            </div>
                            <legend>Validation inputs</legend>
                            <div class='form-group has-warning'>
                                <label class='col-lg-2 control-label'>Text field</label>
                                <div class='col-lg-10'>
                                    <input class='form-control' placeholder='Enter username' type='text'>
                                </div>
                            </div>
                            <div class='form-group has-error'>
                                <label class='col-lg-2 control-label'>Password field</label>
                                <div class='col-lg-10'>
                                    <input class='form-control' placeholder='Enter password' type='password'>
                                </div>
                            </div>
                            <div class='form-group has-success'>
                                <label class='col-lg-2 control-label'>Input field with help</label>
                                <div class='col-lg-10'>
                                    <input class='form-control' placeholder='.help-block'>
                                    <p class='help-block'>Example block-level help text here.</p>
                                </div>
                            </div>
                        </fieldset>
                        <div class='form-actions'>
                            <button class='btn btn-default' type='submit'>Save</button>
                            <a class='btn' href='#'>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <i class='icon-edit icon-large'></i> Knob Inputs
                </div>
                <div class='panel-body text-center'>
                    <input class='knob' data-height='150' data-width='150' type='text' value='75'>
                    <input class='knob' data-fgColor='#16a085' data-height='150' data-width='150' type='text' value='100'>
                    <input class='knob' data-fgColor='#7f8c8d' data-height='150' data-width='150' type='text' value='200'>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
</body>
<!-- Javascripts -->
<script type="text/javascript" src="{!! asset('bower_components/jquery/dist/jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>

</html>