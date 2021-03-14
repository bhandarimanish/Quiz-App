<div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="{{route('quiz.index')}}" class="btn-box big span4"><i class=" icon-book"></i><b>
                                        {{App\Models\Quiz::count()}}
                                    </b>
                                        <p class="text-muted">
                                            Quiz</p>
                                    </a><a href="{{route('user.index')}}" class="btn-box big span4"><i class="icon-user"></i><b>
                                        {{App\Models\User::where('is_admin',0)->count()}}
                                    </b>
                                        <p class="text-muted">
                                             Users</p>
                                    </a><a href="{{route('question.index')}}" class="btn-box big span4"><i class="icon-question-sign"></i><b>
                                        {{App\Models\Question::count()}}
                                    </b>
                                        <p class="text-muted">
                                            Questions</p>
                                    </a>
                                </div>
                                <div class="btn-box-row row-fluid">
                                    <div class="span8">
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="{{route('quiz.create')}}" class="btn-box small span4"><i class="icon-arrow-up"></i><b>Create Quiz</b>
                                                </a><a href="{{route('user.create')}}" class="btn-box small span4"><i class="icon-user-md"></i><b>Create User</b>
                                                </a><a href="{{route('question.create')}}" class="btn-box small span4"><i class="icon-arrow-down"></i><b>Create Question</b>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="{{route('assign.exam')}}" class="btn-box small span4"><i class="icon-pencil"></i><b>Assign Exam</b>
                                                </a><a href="{{route('view.exam')}}" class="btn-box small span4"><i class="icon-eye-open"></i><b>View Exam</b>
                                                </a><a href="{{route('result')}}" class="btn-box small span4"><i class="icon-eye-close"></i><b>View Result
                                                    </b> </a>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="widget widget-usage unstyled span4">
                                        <li>
                                            <p>
                                                <strong>Laravel</strong> <span class="pull-right small muted">78%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar" style="width: 78%;">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>
                                                <strong>Bootstrap</strong> <span class="pull-right small muted">56%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar bar-success" style="width: 56%;">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>
                                                <strong>Moment JS</strong> <span class="pull-right small muted">44%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar bar-warning" style="width: 44%;">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>
                                                <strong>PHP</strong> <span class="pull-right small muted">67%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar bar-danger" style="width: 67%;">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        
                            <div class="module">
                                <div class="module-head">
                                    <h3><center>
                                        DataTables</center></h3>
                                </div>
                                <div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                        width="100%">
                                        <thead>
                                            <tr style="background-color: #c5d5ff;
background-image: linear-gradient(180deg, #c5d5ff 0%, #fbe8f6 100%);
">
                                                <th>
                                                    Role
                                                </th>
                                                <th>
                                                    Email
                                                </th>
                                                <th>
                                                    Password
                                                </th>
                                                <th>
                                                     Address
                                                </th>
                                                <th>
                                                    Phone
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
                                                <td>
                                                    {{auth()->user()->name}}
                                                </td>
                                                <td>
                                                {{auth()->user()->email}}
                                                </td>
                                                <td>
                                                {{auth()->user()->visible_password}}
                                                </td>
                                                <td class="center">
                                                {{auth()->user()->address}}
                                                </td>
                                                <td class="center">
                                                {{auth()->user()->phone}}
                                                </td>
                                            </tr>
                                          
                                    </table>
                                </div>
                            </div>
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>