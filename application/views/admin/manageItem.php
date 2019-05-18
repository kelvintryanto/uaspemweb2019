<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        Manage Item
        <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#addNewItem">
            Add New Item
        </button>
    </h1>
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors() ?>
        </div>
    <?php endif; ?>

    <?= $this->session->flashdata('message') ?>

    <div class="row">
        <?php foreach ($item as $i) : ?>
            <div class="col-sm-2">
                <div class="card mb-3">
                    <img src="<?= base_url('assets/img/item/') . $i['image']; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title mb-0"><?= $i['name']; ?></h5>
                        <p class="card-text mb-0"><?= $i['price']; ?></p>
                        <p class="card-text mb-0">Stock : <?= $i['stock']; ?></p>
                        <p class="card-text text-truncate">Posted by : <?= $i['username']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>                
                <th>#</th>
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
                <td>
                    <ccc title="$320,800" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">4.654.807.516Rp ($320,800)</ccc>
                </td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>
                    <ccc title="$170,750" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">2.477.582.242Rp ($170,750)</ccc>
                </td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
                <td>
                    <ccc title="$86,000" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.247.859.870Rp ($86,000)</ccc>
                </td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012/03/29</td>
                <td>
                    <ccc title="$433,060" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">6.283.699.947Rp ($433,060)</ccc>
                </td>
            </tr>
            <tr>
                <td>Airi Satou</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>2008/11/28</td>
                <td>
                    <ccc title="$162,700" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">2.360.776.754Rp ($162,700)</ccc>
                </td>
            </tr>
            <tr>
                <td>Brielle Williamson</td>
                <td>Integration Specialist</td>
                <td>New York</td>
                <td>61</td>
                <td>2012/12/02</td>
                <td>
                    <ccc title="$372,000" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">5.397.719.439Rp ($372,000)</ccc>
                </td>
            </tr>
            <tr>
                <td>Herrod Chandler</td>
                <td>Sales Assistant</td>
                <td>San Francisco</td>
                <td>59</td>
                <td>2012/08/06</td>
                <td>
                    <ccc title="$137,500" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.995.124.793Rp ($137,500)</ccc>
                </td>
            </tr>
            <tr>
                <td>Rhona Davidson</td>
                <td>Integration Specialist</td>
                <td>Tokyo</td>
                <td>55</td>
                <td>2010/10/14</td>
                <td>
                    <ccc title="$327,900" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">4.757.828.505Rp ($327,900)</ccc>
                </td>
            </tr>
            <tr>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>39</td>
                <td>2009/09/15</td>
                <td>
                    <ccc title="$205,500" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">2.981.804.690Rp ($205,500)</ccc>
                </td>
            </tr>
            <tr>
                <td>Sonya Frost</td>
                <td>Software Engineer</td>
                <td>Edinburgh</td>
                <td>23</td>
                <td>2008/12/13</td>
                <td>
                    <ccc title="$103,600" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.503.235.844Rp ($103,600)</ccc>
                </td>
            </tr>
            <tr>
                <td>Jena Gaines</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>30</td>
                <td>2008/12/19</td>
                <td>
                    <ccc title="$90,560" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.314.025.463Rp ($90,560)</ccc>
                </td>
            </tr>
            <tr>
                <td>Quinn Flynn</td>
                <td>Support Lead</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2013/03/03</td>
                <td>
                    <ccc title="$342,000" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">4.962.419.484Rp ($342,000)</ccc>
                </td>
            </tr>
            <tr>
                <td>Charde Marshall</td>
                <td>Regional Director</td>
                <td>San Francisco</td>
                <td>36</td>
                <td>2008/10/16</td>
                <td>
                    <ccc title="$470,600" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">6.828.405.290Rp ($470,600)</ccc>
                </td>
            </tr>
            <tr>
                <td>Haley Kennedy</td>
                <td>Senior Marketing Designer</td>
                <td>London</td>
                <td>43</td>
                <td>2012/12/18</td>
                <td>
                    <ccc title="$313,500" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">4.548.884.527Rp ($313,500)</ccc>
                </td>
            </tr>
            <tr>
                <td>Tatyana Fitzpatrick</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>19</td>
                <td>2010/03/17</td>
                <td>
                    <ccc title="$385,750" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">5.597.231.918Rp ($385,750)</ccc>
                </td>
            </tr>
            <tr>
                <td>Michael Silva</td>
                <td>Marketing Designer</td>
                <td>London</td>
                <td>66</td>
                <td>2012/11/27</td>
                <td>
                    <ccc title="$198,500" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">2.880.234.700Rp ($198,500)</ccc>
                </td>
            </tr>
            <tr>
                <td>Paul Byrd</td>
                <td>Chief Financial Officer (CFO)</td>
                <td>New York</td>
                <td>64</td>
                <td>2010/06/09</td>
                <td>
                    <ccc title="$725,000" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">10.519.748.906Rp ($725,000)</ccc>
                </td>
            </tr>
            <tr>
                <td>Gloria Little</td>
                <td>Systems Administrator</td>
                <td>New York</td>
                <td>59</td>
                <td>2009/04/10</td>
                <td>
                    <ccc title="$237,500" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">3.446.124.642Rp ($237,500)</ccc>
                </td>
            </tr>
            <tr>
                <td>Bradley Greer</td>
                <td>Software Engineer</td>
                <td>London</td>
                <td>41</td>
                <td>2012/10/13</td>
                <td>
                    <ccc title="$132,000" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.915.319.801Rp ($132,000)</ccc>
                </td>
            </tr>
            <tr>
                <td>Dai Rios</td>
                <td>Personnel Lead</td>
                <td>Edinburgh</td>
                <td>35</td>
                <td>2012/09/26</td>
                <td>
                    <ccc title="$217,500" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">3.155.924.672Rp ($217,500)</ccc>
                </td>
            </tr>
            <tr>
                <td>Jenette Caldwell</td>
                <td>Development Lead</td>
                <td>New York</td>
                <td>30</td>
                <td>2011/09/03</td>
                <td>
                    <ccc title="$345,000" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">5.005.949.479Rp ($345,000)</ccc>
                </td>
            </tr>
            <tr>
                <td>Yuri Berry</td>
                <td>Chief Marketing Officer (CMO)</td>
                <td>New York</td>
                <td>40</td>
                <td>2009/06/25</td>
                <td>
                    <ccc title="$675,000" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">9.794.248.981Rp ($675,000)</ccc>
                </td>
            </tr>
            <tr>
                <td>Caesar Vance</td>
                <td>Pre-Sales Support</td>
                <td>New York</td>
                <td>21</td>
                <td>2011/12/12</td>
                <td>
                    <ccc title="$106,450" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.544.589.339Rp ($106,450)</ccc>
                </td>
            </tr>
            <tr>
                <td>Doris Wilder</td>
                <td>Sales Assistant</td>
                <td>Sidney</td>
                <td>23</td>
                <td>2010/09/20</td>
                <td>
                    <ccc title="$85,600" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.242.055.871Rp ($85,600)</ccc>
                </td>
            </tr>
            <tr>
                <td>Angelica Ramos</td>
                <td>Chief Executive Officer (CEO)</td>
                <td>London</td>
                <td>47</td>
                <td>2009/10/09</td>
                <td>
                    <ccc title="$1,200,000" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">17.411.998.189Rp ($1,200,000)</ccc>
                </td>
            </tr>
            <tr>
                <td>Gavin Joyce</td>
                <td>Developer</td>
                <td>Edinburgh</td>
                <td>42</td>
                <td>2010/12/22</td>
                <td>
                    <ccc title="$92,575" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.343.263.110Rp ($92,575)</ccc>
                </td>
            </tr>
            <tr>
                <td>Jennifer Chang</td>
                <td>Regional Director</td>
                <td>Singapore</td>
                <td>28</td>
                <td>2010/11/14</td>
                <td>
                    <ccc title="$357,650" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">5.189.500.960Rp ($357,650)</ccc>
                </td>
            </tr>
            <tr>
                <td>Brenden Wagner</td>
                <td>Software Engineer</td>
                <td>San Francisco</td>
                <td>28</td>
                <td>2011/06/07</td>
                <td>
                    <ccc title="$206,850" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">3.001.393.188Rp ($206,850)</ccc>
                </td>
            </tr>
            <tr>
                <td>Fiona Green</td>
                <td>Chief Operating Officer (COO)</td>
                <td>San Francisco</td>
                <td>48</td>
                <td>2010/03/11</td>
                <td>
                    <ccc title="$850,000" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">12.333.498.717Rp ($850,000)</ccc>
                </td>
            </tr>
            <tr>
                <td>Shou Itou</td>
                <td>Regional Marketing</td>
                <td>Tokyo</td>
                <td>20</td>
                <td>2011/08/14</td>
                <td>
                    <ccc title="$163,000" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">2.365.129.754Rp ($163,000)</ccc>
                </td>
            </tr>
            <tr>
                <td>Michelle House</td>
                <td>Integration Specialist</td>
                <td>Sidney</td>
                <td>37</td>
                <td>2011/06/02</td>
                <td>
                    <ccc title="$95,400" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.384.253.856Rp ($95,400)</ccc>
                </td>
            </tr>
            <tr>
                <td>Suki Burks</td>
                <td>Developer</td>
                <td>London</td>
                <td>53</td>
                <td>2009/10/22</td>
                <td>
                    <ccc title="$114,500" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.661.394.827Rp ($114,500)</ccc>
                </td>
            </tr>
            <tr>
                <td>Prescott Bartlett</td>
                <td>Technical Author</td>
                <td>London</td>
                <td>27</td>
                <td>2011/05/07</td>
                <td>
                    <ccc title="$145,000" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">2.103.949.781Rp ($145,000)</ccc>
                </td>
            </tr>
            <tr>
                <td>Gavin Cortez</td>
                <td>Team Leader</td>
                <td>San Francisco</td>
                <td>22</td>
                <td>2008/10/26</td>
                <td>
                    <ccc title="$235,500" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">3.417.104.645Rp ($235,500)</ccc>
                </td>
            </tr>
            <tr>
                <td>Martena Mccray</td>
                <td>Post-Sales support</td>
                <td>Edinburgh</td>
                <td>46</td>
                <td>2011/03/09</td>
                <td>
                    <ccc title="$324,050" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">4.701.965.011Rp ($324,050)</ccc>
                </td>
            </tr>
            <tr>
                <td>Unity Butler</td>
                <td>Marketing Designer</td>
                <td>San Francisco</td>
                <td>47</td>
                <td>2009/12/09</td>
                <td>
                    <ccc title="$85,675" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.243.144.121Rp ($85,675)</ccc>
                </td>
            </tr>
            <tr>
                <td>Howard Hatfield</td>
                <td>Office Manager</td>
                <td>San Francisco</td>
                <td>51</td>
                <td>2008/12/16</td>
                <td>
                    <ccc title="$164,500" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">2.386.894.752Rp ($164,500)</ccc>
                </td>
            </tr>
            <tr>
                <td>Hope Fuentes</td>
                <td>Secretary</td>
                <td>San Francisco</td>
                <td>41</td>
                <td>2010/02/12</td>
                <td>
                    <ccc title="$109,850" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.593.923.334Rp ($109,850)</ccc>
                </td>
            </tr>
            <tr>
                <td>Vivian Harrell</td>
                <td>Financial Controller</td>
                <td>San Francisco</td>
                <td>62</td>
                <td>2009/02/14</td>
                <td>
                    <ccc title="$452,500" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">6.565.774.317Rp ($452,500)</ccc>
                </td>
            </tr>
            <tr>
                <td>Timothy Mooney</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>37</td>
                <td>2008/12/11</td>
                <td>
                    <ccc title="$136,200" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.976.261.794Rp ($136,200)</ccc>
                </td>
            </tr>
            <tr>
                <td>Jackson Bradshaw</td>
                <td>Director</td>
                <td>New York</td>
                <td>65</td>
                <td>2008/09/26</td>
                <td>
                    <ccc title="$645,750" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">9.369.831.526Rp ($645,750)</ccc>
                </td>
            </tr>
            <tr>
                <td>Olivia Liang</td>
                <td>Support Engineer</td>
                <td>Singapore</td>
                <td>64</td>
                <td>2011/02/03</td>
                <td>
                    <ccc title="$234,500" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">3.402.594.646Rp ($234,500)</ccc>
                </td>
            </tr>
            <tr>
                <td>Bruno Nash</td>
                <td>Software Engineer</td>
                <td>London</td>
                <td>38</td>
                <td>2011/05/03</td>
                <td>
                    <ccc title="$163,500" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">2.372.384.753Rp ($163,500)</ccc>
                </td>
            </tr>
            <tr>
                <td>Sakura Yamamoto</td>
                <td>Support Engineer</td>
                <td>Tokyo</td>
                <td>37</td>
                <td>2009/08/19</td>
                <td>
                    <ccc title="$139,575" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">2.025.233.039Rp ($139,575)</ccc>
                </td>
            </tr>
            <tr>
                <td>Thor Walton</td>
                <td>Developer</td>
                <td>New York</td>
                <td>61</td>
                <td>2013/08/11</td>
                <td>
                    <ccc title="$98,540" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.429.815.251Rp ($98,540)</ccc>
                </td>
            </tr>
            <tr>
                <td>Finn Camacho</td>
                <td>Support Engineer</td>
                <td>San Francisco</td>
                <td>47</td>
                <td>2009/07/07</td>
                <td>
                    <ccc title="$87,500" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.269.624.868Rp ($87,500)</ccc>
                </td>
            </tr>
            <tr>
                <td>Serge Baldwin</td>
                <td>Data Coordinator</td>
                <td>Singapore</td>
                <td>64</td>
                <td>2012/04/09</td>
                <td>
                    <ccc title="$138,575" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">2.010.723.041Rp ($138,575)</ccc>
                </td>
            </tr>
            <tr>
                <td>Zenaida Frank</td>
                <td>Software Engineer</td>
                <td>New York</td>
                <td>63</td>
                <td>2010/01/04</td>
                <td>
                    <ccc title="$125,250" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.817.377.311Rp ($125,250)</ccc>
                </td>
            </tr>
            <tr>
                <td>Zorita Serrano</td>
                <td>Software Engineer</td>
                <td>San Francisco</td>
                <td>56</td>
                <td>2012/06/01</td>
                <td>
                    <ccc title="$115,000" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.668.649.826Rp ($115,000)</ccc>
                </td>
            </tr>
            <tr>
                <td>Jennifer Acosta</td>
                <td>Junior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>43</td>
                <td>2013/02/01</td>
                <td>
                    <ccc title="$75,650" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.097.681.386Rp ($75,650)</ccc>
                </td>
            </tr>
            <tr>
                <td>Cara Stevens</td>
                <td>Sales Assistant</td>
                <td>New York</td>
                <td>46</td>
                <td>2011/12/06</td>
                <td>
                    <ccc title="$145,600" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">2.112.655.780Rp ($145,600)</ccc>
                </td>
            </tr>
            <tr>
                <td>Hermione Butler</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>47</td>
                <td>2011/03/21</td>
                <td>
                    <ccc title="$356,250" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">5.169.186.962Rp ($356,250)</ccc>
                </td>
            </tr>
            <tr>
                <td>Lael Greer</td>
                <td>Systems Administrator</td>
                <td>London</td>
                <td>21</td>
                <td>2009/02/27</td>
                <td>
                    <ccc title="$103,500" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.501.784.844Rp ($103,500)</ccc>
                </td>
            </tr>
            <tr>
                <td>Jonas Alexander</td>
                <td>Developer</td>
                <td>San Francisco</td>
                <td>30</td>
                <td>2010/07/14</td>
                <td>
                    <ccc title="$86,500" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.255.114.869Rp ($86,500)</ccc>
                </td>
            </tr>
            <tr>
                <td>Shad Decker</td>
                <td>Regional Director</td>
                <td>Edinburgh</td>
                <td>51</td>
                <td>2008/11/13</td>
                <td>
                    <ccc title="$183,000" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">2.655.329.724Rp ($183,000)</ccc>
                </td>
            </tr>
            <tr>
                <td>Michael Bruce</td>
                <td>Javascript Developer</td>
                <td>Singapore</td>
                <td>29</td>
                <td>2011/06/27</td>
                <td>
                    <ccc title="$183,000" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">2.655.329.724Rp ($183,000)</ccc>
                </td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
                <td>
                    <ccc title="$112,000" class="ccc--converted" style="font-size: inherit; display: inline; color: inherit;">1.625.119.831Rp ($112,000)</ccc>
                </td>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="addNewItem" tabindex="-1" role="dialog" aria-labelledby="addNewItem" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewItem">Add New Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- form_open_multipart untuk upload image dalam codeigniter -->
            <!-- supaya bisa upload ke folder asset -->
            <?= form_open_multipart('admin/manageItem'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="itemName" name="itemName" placeholder="Item Name">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="price" name="price" placeholder="Price">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add Item</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal -->

