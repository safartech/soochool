@extends("templates.wrapper.modern")
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('js/select2/css/select2.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>

    <link rel="stylesheet" href="{{ asset('assets/datatables/plugins/Buttons/css/buttons.jqueryui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/plugins/Buttons/css/buttons.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/plugins/Buttons/css/buttons.dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lib/datatables/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/plugins/Select/css/select.dataTables.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('assets/datatables/editor/css/editor.dataTables.css') }}">--}}

    <style>
        .select2{
            width: 100%;

        }

    </style>
@endsection

@section('js')

    <script src="{{ asset('js/select2/js/select2.min.js') }}" type="module"></script>
    <script type="text/javascript" src="{{asset('js/momentjs/moment.js')}}"></script>
    <script src="{{ asset('js/momentjs/moment-with-locales.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/vues/admin/eleves.js') }}" type="module"></script>

    <script src="{{ asset('assets/lib/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/jquery.datatables.js') }}"></script>
    <script src="{{ asset('assets/lib/datatables/js/dataTables.bootstrap.min.js') }}"></script>
    {{--<script src="{{ asset('assets/lib/datatables/plugins/buttons/js/dataTables.buttons.js') }}"></script>--}}
    <script src="{{ asset('assets/datatables/plugins/Select/js/select.dataTables.js') }}"></script>
    {{--<script src="{{ asset('assets/datatables/editor/js/dataTables.editor.js') }}"></script>--}}


{{--    <script src="{{ asset('assets/datatables/plugins/Buttons/js/buttons.jqueryui.js') }}"></script>--}}
    <script src="{{ asset('assets/datatables/plugins/Buttons/js/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('assets/datatables/plugins/Buttons/js/buttons.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/datatables/plugins/Buttons/js/buttons.print.js') }}"></script>
    <script src="{{ asset('assets/datatables/plugins/Buttons/js/buttons.html5.js') }}"></script>
    <script src="{{ asset('assets/datatables/plugins/Buttons/js/buttons.flash.js') }}"></script>
    <script src="{{ asset('assets/datatables/plugins/Buttons/js/buttons.colVis.js') }}"></script>
    <script src="{{ asset('assets/datatables/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/datatables/export/jszip.min.js') }}"></script>


    {{--<script src="{{ asset('assets/lib/datatables/plugins/buttons/js/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('assets/lib/datatables/plugins/buttons/js/buttons.print.js') }}"></script>
    <script src="{{ asset('assets/lib/datatables/plugins/buttons/js/buttons.html5.js') }}"></script>
    <script src="{{ asset('assets/lib/datatables/plugins/buttons/js/buttons.flash.js') }}"></script>
    <script src="{{ asset('assets/lib/datatables/plugins/buttons/js/buttons.colVis.js') }}"></script>
    <script src="{{ asset('assets/lib/datatables/plugins/buttons/js/buttons.bootstrap.js') }}"></script>--}}


    {{--<script src="{{ asset('js/datatables/jszip.min.js') }}"></script>--}}
    {{--<script src="{{ asset('js/datatables/pdfmake.min.js') }}"></script>--}}
    {{--<script src="{{ asset('js/datatables/vfs_fonts.js') }}"></script>--}}
{{--    <script src="{{ asset('js/datatables/dataTables.fixedHeader.min.js') }}"></script>--}}

    <template id="eleves">

        <div class="col-md-12 col-sm-6">
            <div class="card border-top-primary">
                <div class="card-header">
                    <h4 class="card-title">Elèves</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <p class="card-text">Use <code>border-top-*</code> class for border top color.</p>
                    </div>
                </div>
            </div>

            <section id="file-export">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">File export</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <p class="card-text">Exporting data from a table can often be a key part of a complex application. The Buttons extension for DataTables provides three plug-ins that provide overlapping functionality for data export.</p>
                                    <table class="table table-striped table-bordered file-export">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>2009/01/12</td>
                                            <td>$86,000</td>
                                        </tr>
                                        <tr>
                                            <td>Cedric Kelly</td>
                                            <td>Senior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2012/03/29</td>
                                            <td>$433,060</td>
                                        </tr>
                                        <tr>
                                            <td>Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
                                            <td>2008/11/28</td>
                                            <td>$162,700</td>
                                        </tr>
                                        <tr>
                                            <td>Brielle Williamson</td>
                                            <td>Integration Specialist</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>2012/12/02</td>
                                            <td>$372,000</td>
                                        </tr>
                                        <tr>
                                            <td>Herrod Chandler</td>
                                            <td>Sales Assistant</td>
                                            <td>San Francisco</td>
                                            <td>59</td>
                                            <td>2012/08/06</td>
                                            <td>$137,500</td>
                                        </tr>
                                        <tr>
                                            <td>Rhona Davidson</td>
                                            <td>Integration Specialist</td>
                                            <td>Tokyo</td>
                                            <td>55</td>
                                            <td>2010/10/14</td>
                                            <td>$327,900</td>
                                        </tr>
                                        <tr>
                                            <td>Colleen Hurst</td>
                                            <td>Javascript Developer</td>
                                            <td>San Francisco</td>
                                            <td>39</td>
                                            <td>2009/09/15</td>
                                            <td>$205,500</td>
                                        </tr>
                                        <tr>
                                            <td>Sonya Frost</td>
                                            <td>Software Engineer</td>
                                            <td>Edinburgh</td>
                                            <td>23</td>
                                            <td>2008/12/13</td>
                                            <td>$103,600</td>
                                        </tr>
                                        <tr>
                                            <td>Jena Gaines</td>
                                            <td>Office Manager</td>
                                            <td>London</td>
                                            <td>30</td>
                                            <td>2008/12/19</td>
                                            <td>$90,560</td>
                                        </tr>
                                        <tr>
                                            <td>Quinn Flynn</td>
                                            <td>Support Lead</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2013/03/03</td>
                                            <td>$342,000</td>
                                        </tr>
                                        <tr>
                                            <td>Charde Marshall</td>
                                            <td>Regional Director</td>
                                            <td>San Francisco</td>
                                            <td>36</td>
                                            <td>2008/10/16</td>
                                            <td>$470,600</td>
                                        </tr>
                                        <tr>
                                            <td>Haley Kennedy</td>
                                            <td>Senior Marketing Designer</td>
                                            <td>London</td>
                                            <td>43</td>
                                            <td>2012/12/18</td>
                                            <td>$313,500</td>
                                        </tr>
                                        <tr>
                                            <td>Tatyana Fitzpatrick</td>
                                            <td>Regional Director</td>
                                            <td>London</td>
                                            <td>19</td>
                                            <td>2010/03/17</td>
                                            <td>$385,750</td>
                                        </tr>
                                        <tr>
                                            <td>Michael Silva</td>
                                            <td>Marketing Designer</td>
                                            <td>London</td>
                                            <td>66</td>
                                            <td>2012/11/27</td>
                                            <td>$198,500</td>
                                        </tr>
                                        <tr>
                                            <td>Paul Byrd</td>
                                            <td>Chief Financial Officer (CFO)</td>
                                            <td>New York</td>
                                            <td>64</td>
                                            <td>2010/06/09</td>
                                            <td>$725,000</td>
                                        </tr>
                                        <tr>
                                            <td>Gloria Little</td>
                                            <td>Systems Administrator</td>
                                            <td>New York</td>
                                            <td>59</td>
                                            <td>2009/04/10</td>
                                            <td>$237,500</td>
                                        </tr>
                                        <tr>
                                            <td>Bradley Greer</td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>41</td>
                                            <td>2012/10/13</td>
                                            <td>$132,000</td>
                                        </tr>
                                        <tr>
                                            <td>Dai Rios</td>
                                            <td>Personnel Lead</td>
                                            <td>Edinburgh</td>
                                            <td>35</td>
                                            <td>2012/09/26</td>
                                            <td>$217,500</td>
                                        </tr>
                                        <tr>
                                            <td>Jenette Caldwell</td>
                                            <td>Development Lead</td>
                                            <td>New York</td>
                                            <td>30</td>
                                            <td>2011/09/03</td>
                                            <td>$345,000</td>
                                        </tr>
                                        <tr>
                                            <td>Yuri Berry</td>
                                            <td>Chief Marketing Officer (CMO)</td>
                                            <td>New York</td>
                                            <td>40</td>
                                            <td>2009/06/25</td>
                                            <td>$675,000</td>
                                        </tr>
                                        <tr>
                                            <td>Caesar Vance</td>
                                            <td>Pre-Sales Support</td>
                                            <td>New York</td>
                                            <td>21</td>
                                            <td>2011/12/12</td>
                                            <td>$106,450</td>
                                        </tr>
                                        <tr>
                                            <td>Doris Wilder</td>
                                            <td>Sales Assistant</td>
                                            <td>Sidney</td>
                                            <td>23</td>
                                            <td>2010/09/20</td>
                                            <td>$85,600</td>
                                        </tr>
                                        <tr>
                                            <td>Angelica Ramos</td>
                                            <td>Chief Executive Officer (CEO)</td>
                                            <td>London</td>
                                            <td>47</td>
                                            <td>2009/10/09</td>
                                            <td>$1,200,000</td>
                                        </tr>
                                        <tr>
                                            <td>Gavin Joyce</td>
                                            <td>Developer</td>
                                            <td>Edinburgh</td>
                                            <td>42</td>
                                            <td>2010/12/22</td>
                                            <td>$92,575</td>
                                        </tr>
                                        <tr>
                                            <td>Jennifer Chang</td>
                                            <td>Regional Director</td>
                                            <td>Singapore</td>
                                            <td>28</td>
                                            <td>2010/11/14</td>
                                            <td>$357,650</td>
                                        </tr>
                                        <tr>
                                            <td>Brenden Wagner</td>
                                            <td>Software Engineer</td>
                                            <td>San Francisco</td>
                                            <td>28</td>
                                            <td>2011/06/07</td>
                                            <td>$206,850</td>
                                        </tr>
                                        <tr>
                                            <td>Fiona Green</td>
                                            <td>Chief Operating Officer (COO)</td>
                                            <td>San Francisco</td>
                                            <td>48</td>
                                            <td>2010/03/11</td>
                                            <td>$850,000</td>
                                        </tr>
                                        <tr>
                                            <td>Shou Itou</td>
                                            <td>Regional Marketing</td>
                                            <td>Tokyo</td>
                                            <td>20</td>
                                            <td>2011/08/14</td>
                                            <td>$163,000</td>
                                        </tr>
                                        <tr>
                                            <td>Michelle House</td>
                                            <td>Integration Specialist</td>
                                            <td>Sidney</td>
                                            <td>37</td>
                                            <td>2011/06/02</td>
                                            <td>$95,400</td>
                                        </tr>
                                        <tr>
                                            <td>Suki Burks</td>
                                            <td>Developer</td>
                                            <td>London</td>
                                            <td>53</td>
                                            <td>2009/10/22</td>
                                            <td>$114,500</td>
                                        </tr>
                                        <tr>
                                            <td>Prescott Bartlett</td>
                                            <td>Technical Author</td>
                                            <td>London</td>
                                            <td>27</td>
                                            <td>2011/05/07</td>
                                            <td>$145,000</td>
                                        </tr>
                                        <tr>
                                            <td>Gavin Cortez</td>
                                            <td>Team Leader</td>
                                            <td>San Francisco</td>
                                            <td>22</td>
                                            <td>2008/10/26</td>
                                            <td>$235,500</td>
                                        </tr>
                                        <tr>
                                            <td>Martena Mccray</td>
                                            <td>Post-Sales support</td>
                                            <td>Edinburgh</td>
                                            <td>46</td>
                                            <td>2011/03/09</td>
                                            <td>$324,050</td>
                                        </tr>
                                        <tr>
                                            <td>Unity Butler</td>
                                            <td>Marketing Designer</td>
                                            <td>San Francisco</td>
                                            <td>47</td>
                                            <td>2009/12/09</td>
                                            <td>$85,675</td>
                                        </tr>
                                        <tr>
                                            <td>Howard Hatfield</td>
                                            <td>Office Manager</td>
                                            <td>San Francisco</td>
                                            <td>51</td>
                                            <td>2008/12/16</td>
                                            <td>$164,500</td>
                                        </tr>
                                        <tr>
                                            <td>Hope Fuentes</td>
                                            <td>Secretary</td>
                                            <td>San Francisco</td>
                                            <td>41</td>
                                            <td>2010/02/12</td>
                                            <td>$109,850</td>
                                        </tr>
                                        <tr>
                                            <td>Vivian Harrell</td>
                                            <td>Financial Controller</td>
                                            <td>San Francisco</td>
                                            <td>62</td>
                                            <td>2009/02/14</td>
                                            <td>$452,500</td>
                                        </tr>
                                        <tr>
                                            <td>Timothy Mooney</td>
                                            <td>Office Manager</td>
                                            <td>London</td>
                                            <td>37</td>
                                            <td>2008/12/11</td>
                                            <td>$136,200</td>
                                        </tr>
                                        <tr>
                                            <td>Jackson Bradshaw</td>
                                            <td>Director</td>
                                            <td>New York</td>
                                            <td>65</td>
                                            <td>2008/09/26</td>
                                            <td>$645,750</td>
                                        </tr>
                                        <tr>
                                            <td>Olivia Liang</td>
                                            <td>Support Engineer</td>
                                            <td>Singapore</td>
                                            <td>64</td>
                                            <td>2011/02/03</td>
                                            <td>$234,500</td>
                                        </tr>
                                        <tr>
                                            <td>Bruno Nash</td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>38</td>
                                            <td>2011/05/03</td>
                                            <td>$163,500</td>
                                        </tr>
                                        <tr>
                                            <td>Sakura Yamamoto</td>
                                            <td>Support Engineer</td>
                                            <td>Tokyo</td>
                                            <td>37</td>
                                            <td>2009/08/19</td>
                                            <td>$139,575</td>
                                        </tr>
                                        <tr>
                                            <td>Thor Walton</td>
                                            <td>Developer</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>2013/08/11</td>
                                            <td>$98,540</td>
                                        </tr>
                                        <tr>
                                            <td>Finn Camacho</td>
                                            <td>Support Engineer</td>
                                            <td>San Francisco</td>
                                            <td>47</td>
                                            <td>2009/07/07</td>
                                            <td>$87,500</td>
                                        </tr>
                                        <tr>
                                            <td>Serge Baldwin</td>
                                            <td>Data Coordinator</td>
                                            <td>Singapore</td>
                                            <td>64</td>
                                            <td>2012/04/09</td>
                                            <td>$138,575</td>
                                        </tr>
                                        <tr>
                                            <td>Zenaida Frank</td>
                                            <td>Software Engineer</td>
                                            <td>New York</td>
                                            <td>63</td>
                                            <td>2010/01/04</td>
                                            <td>$125,250</td>
                                        </tr>
                                        <tr>
                                            <td>Zorita Serrano</td>
                                            <td>Software Engineer</td>
                                            <td>San Francisco</td>
                                            <td>56</td>
                                            <td>2012/06/01</td>
                                            <td>$115,000</td>
                                        </tr>
                                        <tr>
                                            <td>Jennifer Acosta</td>
                                            <td>Junior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>43</td>
                                            <td>2013/02/01</td>
                                            <td>$75,650</td>
                                        </tr>
                                        <tr>
                                            <td>Cara Stevens</td>
                                            <td>Sales Assistant</td>
                                            <td>New York</td>
                                            <td>46</td>
                                            <td>2011/12/06</td>
                                            <td>$145,600</td>
                                        </tr>
                                        <tr>
                                            <td>Hermione Butler</td>
                                            <td>Regional Director</td>
                                            <td>London</td>
                                            <td>47</td>
                                            <td>2011/03/21</td>
                                            <td>$356,250</td>
                                        </tr>
                                        <tr>
                                            <td>Lael Greer</td>
                                            <td>Systems Administrator</td>
                                            <td>London</td>
                                            <td>21</td>
                                            <td>2009/02/27</td>
                                            <td>$103,500</td>
                                        </tr>
                                        <tr>
                                            <td>Jonas Alexander</td>
                                            <td>Developer</td>
                                            <td>San Francisco</td>
                                            <td>30</td>
                                            <td>2010/07/14</td>
                                            <td>$86,500</td>
                                        </tr>
                                        <tr>
                                            <td>Shad Decker</td>
                                            <td>Regional Director</td>
                                            <td>Edinburgh</td>
                                            <td>51</td>
                                            <td>2008/11/13</td>
                                            <td>$183,000</td>
                                        </tr>
                                        <tr>
                                            <td>Michael Bruce</td>
                                            <td>Javascript Developer</td>
                                            <td>Singapore</td>
                                            <td>29</td>
                                            <td>2011/06/27</td>
                                            <td>$183,000</td>
                                        </tr>
                                        <tr>
                                            <td>Donna Snider</td>
                                            <td>Customer Support</td>
                                            <td>New York</td>
                                            <td>27</td>
                                            <td>2011/01/25</td>
                                            <td>$112,000</td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>



       {{-- <div class="col-sm-12">



            <div id="form-bp1"  role="dialog" class="modal fade colored-header colored-header-primary">
                <div class="modal-dialog custom-width">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #34a853;">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                            <h3 class="modal-title">Ajout Eleve</h3>
                        </div>
                        <div class="modal-body ">
                            <div class="form-group col-md-6">
                                <label>Nom</label>
                                <input type="text" v-model="newEleve.nom" placeholder="Nom" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Prénoms</label>
                                <input type="text" v-model="newEleve.prenoms" placeholder="Prenom" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label xs-pt-20">Sexe</label>
                                <div class="col-sm-6">
                                    <div class="be-radio-icon inline">
                                        <input v-model="newEleve.sexe" value="F" type="radio" checked="" name="radu" id="radu">
                                        <label for="radu"><span class="mdi mdi-female"></span></label>
                                    </div>
                                    <div class="be-radio-icon inline">
                                        <input type="radio" name="radm" value="M" id="radm" v-model="newEleve.sexe">
                                        <label for="radm"><span class="mdi mdi-male-alt"></span></label>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Date de naissance</label>
                                --}}{{--<input type="text" id="nsce" v-model="newEleve.date_nsce" placeholder="JJ/MM/AAAA" class="form-control">--}}{{--
                                <div id="date-nsce1" data-start-view="4"  data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date">
                                    <input size="16" type="text" value="" class="form-control"><span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
                                </div>

                            </div>
                            <div class="form-group col-md-6">
                                <label>Lieu de Naissance</label>
                                <input type="text" v-model="newEleve.lieu_nsce" placeholder="Lieu de Naissance" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Adresse</label>
                                <input type="text"  v-model="newEleve.adresse" placeholder="Votre Adresse" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Téléphone</label>
                                <input type="text" v-model="newEleve.telephone" placeholder="Votre Téléphone" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Nationalité</label>
                                <input type="text" v-model="newEleve.nationalite" placeholder="Votre Nationalité" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Pays Naissance</label>
                                <input type="text" v-model="newEleve.pays_nsce" placeholder="Pays de Naissance" class="form-control">
                            </div>


                            <div class="form-group col-md-12">
                                <label >Classe</label>
                                <div >
                                    <select class="form-control"  v-model="newEleve.classe_id">
                                        <option :value="classe.id" v-for="classe in classes">@{{ classe.nom }}</option>

                                    </select>
                                </div>
                            </div>

                            <input type="hidden" v-model="nomComplet" placeholder="" class="form-control">

                        </div>


                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                            <button type="button" data-dismiss="modal" class="btn btn-primary md-close" style="background-color: #34a853; border-color: #34a853;" @click="addEleve">Ajouter</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="form-bp2"  role="dialog" class="modal fade colored-header colored-header-primary">
                <div class="modal-dialog custom-width">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                            <h3 class="modal-title">Modification Eleve</h3>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                            <div class=" col-md-6">
                                <label>Nom</label>
                                <input type="text" v-model="updateEleve.nom" placeholder="Nom" class="form-control">
                            </div>
                            <div class=" col-md-6">
                                <label>Prénoms</label>
                                <input type="text" v-model="updateEleve.prenoms" placeholder="Prenom" class="form-control">
                            </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label xs-pt-20">Sexe</label>
                                    <div class="col-sm-6">
                                        <div class="be-radio-icon inline">
                                            <input v-model="updateEleve.sexe" value="F" type="radio" checked="" name="rad1" id="rad1">
                                            <label for="rad1"><span class="mdi mdi-female"></span></label>
                                        </div>
                                        <div class="be-radio-icon inline">
                                            <input type="radio" name="rad1" value="M" id="rad2" v-model="updateEleve.sexe">
                                            <label for="rad2"><span class="mdi mdi-male-alt"></span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Date de naissance : <span class="label label-info">@{{ moment(updateEleve.date_nsce) }}</span> --}}{{--(laissez vide si inchangé)--}}{{--</label>

                                --}}{{--<input type="text" id="nsce" v-model="updateEleve.date_nsce" placeholder="JJ/MM/AAAA" class="form-control">--}}{{--
                                <div id="date-nsce2" data-start-view="4"  data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date">
                                    <input size="16" type="text" value="" class="form-control"><span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Lieu de Naissance</label>
                                <input type="text" v-model="updateEleve.lieu_nsce" placeholder="Lieu de Naissance" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Téléphone</label>
                                <input type="text" v-model="updateEleve.telephone" placeholder="Votre Téléphone" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Adresse</label>
                                <input type="text"  v-model="updateEleve.adresse" placeholder="Votre Adresse" class="form-control">
                            </div>


                            <div class="form-group col-md-6">
                                <label>Nationalité</label>
                                <input type="text" v-model="updateEleve.nationalite" placeholder="Votre Nationalité" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Pays Naissance</label>
                                <input type="text" v-model="updateEleve.pays_nsce" placeholder="Pays de Naissance" class="form-control">
                            </div>

                            <div class="form-group col-md-12">
                                <label >Classe</label>
                                <div >
                                    <select class="form-control"  v-model="updateEleve.classe_id">
                                        <option :value="classe.id" v-for="classe in classes">@{{ classe.nom }}</option>

                                    </select>
                                </div>
                            </div>

                            <input type="hidden" v-model="u_nomComplet" placeholder="Telephone Mobile" class="form-control">

                        </div>


                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default md-close">Annuler</button>
                            <button type="button" data-dismiss="modal" class="btn btn-primary md-close" style="background-color: #34a853; border-color: #34a853;" @click="UpdateEleves">Modifier</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="mod-danger" tabindex="-1" role="dialog" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <div class="text-danger"><span class="modal-main-icon mdi mdi-close-circle-o"></span></div>
                                <h3>Attension!!!!</h3>
                                <p>L' élément sera définitivement supprimer de la Base de Donnée.</p>
                                <div class="xs-mt-50">
                                    <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Annuler</button>
                                    <button type="button" data-dismiss="modal"   @click="del()"  class="btn btn-space btn-danger">Supprimer</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default panel-border-color panel-border-color-primary">
                        <div class="panel-heading panel-heading-divider">Elèves<span class="panel-subtitle">Gestion des informations d'élèves</span></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Options</label>
                                <div class="col-sm-6">
                                    <div class="be-radio be-radio-color inline">
                                        <input type="radio" checked="" v-model="mode" value="0" name="mode" id="imp">
                                        <label for="imp">Consultation</label>
                                    </div>
                                    <div class="be-radio be-radio-color inline">
                                        <input type="radio" v-model="mode" value="1" name="mode" id="rad10">
                                        <label for="rad10">Modification</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row" v-show="isConsultMode">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Liste des élèves
                        </div>
                        <div class="panel-body">
                            <table id="myTable" class="table table-condensed table-hover table-bordered table-striped table-fw-widget" data-page-length='10'>
                                <thead>
                                <tr>

                                    <th >#</th>

                                    --}}{{--<th >#</th>--}}{{--

                                    <th data-class-name="priority">Nom</th>
                                    <th>Prenoms</th>
                                    <th>Sexe</th>
                                    <th>Date Nsce</th>
                                    <th>Adresse</th>
                                    <th>Téléphone</th>
                                    <th>Classe</th>
                                </tr>
                                </thead>

                                --}}{{--<thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prenoms</th>
                                    <th>Age</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="ami in amis">
                                    <td>@{{ ami.nom }}</td>
                                    <td>@{{ ami.prenoms }}</td>
                                    <td>@{{ ami.sexe }}</td>
                                </tr>

                                </tbody>--}}{{--

                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row" v-show="isModifMode">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Liste des élèves
                            <div class="tools"> <button data-toggle="modal" data-target="#form-bp1" type="button" class="btn btn-space btn-success  ">Ajouter</button><span class="icon mdi mdi-more-vert"></span></div>
                        </div>
                        <div class="panel-body">
                            <table id="" class="table table-condensed table-hover table-bordered table-striped table-fw-widget">
                                <thead>
                                <tr>
                                    <th>N°</th>
                                    <th class="text-center">Nom </th>
                                    <th class="text-center">Prenoms</th>
                                    <th class="text-center">Sexe</th>
                                    <th class="text-center">Date Naiss</th>
                                    <th class="text-center">Adresse</th>
                                    --}}{{--<th class="text-center">Nationalite</th>--}}{{--
                                    --}}{{--<th class="text-center">Pays Naissance</th>--}}{{--
                                    <th class="text-center">Telephone</th>
                                    <th class="text-center">Classe</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(eleve,i) in eleves">

                                    <td class="text-center">@{{ i+1 }}</td>
                                    <td class="text-center" >@{{ eleve.nom }}</td>
                                    <td class="text-center" >@{{ eleve.prenoms }}</td>
                                    <td class="text-center">@{{ eleve.sexe }}</td>
                                    <td class="text-center">@{{ eleve.date_nsce }}</td>
                                    <td class="text-center">@{{ eleve.adresse }}</td>
                                    --}}{{--<td class="text-center">@{{ eleve.nationalite }}</td>--}}{{--
                                    --}}{{--<td class="text-center">@{{ eleve.pays_nsce }}</td>--}}{{--
                                    <td class="text-center">@{{ eleve.telephone }}</td>
                                    <td class="text-center"><span v-if="notnull(eleve.classe)">@{{ eleve.classe.nom }}</span></td>
                                    <td class="text-center">
                                        <a class="btn btn-info"  @click="showEditorModal(eleve)">Modifier</a>
                                        <a class="btn btn-danger"   @click="showDeleteModal(eleve)">Supprimer</a>

                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>






        </div>--}}


    </template>


    {{--<script src="{{ asset('assets/lib/jquery.maskedinput/jquery.maskedinput.min.js') }}" type="module"></script>--}}
    <script src="{{ asset('assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            //initialize the javascripts
//            $('#myTable').dataTable()
          //  App.masks();
//            $("#nsce").mask("9999-99-99");
        });
    </script>

@endsection

@section('content')

    <Eleves></Eleves>


@endsection