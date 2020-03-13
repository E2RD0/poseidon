<?php
require_once('core/helpers/dashboard_template.php');
dashboardTemplate::dashHead('Ordenes');
dashboardTemplate::dashMenu('ordenes');
?>

<main>
    <div class="container-fluid position-absolute dash__main">
        <div class="row mx-0 my-2">
            <div class="dash__main_card col-12">
                <div class="col-md-12 col-lg-12 p-0">
                    <ul class="nav nav-categorias" role="tablist">
                        <li class="nav-item">
                            <a data-toggle="tab" href="#ordenes" class="nav-link active dash__tab_title" aria-expanded="true">Ordenes</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane active py-3 px-3 px-sm-0" id="ordenes" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table dash__main_table w-100" id="table">
                            <thead>
                                <tr>
                                    <th>Nombre del cliente</th>
                                    <th>Dirección</th>
                                    <th>Total</th>
                                    <th class="text-right">No. de orden</th>
                                    <th class="text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Andrew Mike</td>
                                    <td>Develop</td>
                                    <td>€ 99,225</td>
                                    <td class="text-right">2013</td>
                                    <td class="td-actions text-right">
                                        <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden" id="modal_open">
                                            Detalles de la orden
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>John Doe</td>
                                    <td>Design</td>
                                    <td>€ 89,241</td>
                                    <td class="text-right">2012</td>
                                    <td class="td-actions text-right">
                                        <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden" id="modal_open">Detalles de la orden</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alex Mike</td>
                                    <td>Design</td>
                                    <td>€ 92,144</td>
                                    <td class="text-right">2010</td>
                                    <td class="td-actions text-right">
                                        <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden" id="modal_open">Detalles de la orden</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mike Monday</td>
                                    <td>Marketing</td>
                                    <td>€ 49,990</td>
                                    <td class="text-right">2009</td>
                                    <td class="td-actions text-right">
                                        <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden" id="modal_open">Detalles de la orden</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Paul Dickens</td>
                                    <td>Communication</td>
                                    <td>€ 69,201</td>
                                    <td class="text-right">2008</td>
                                    <td class="td-actions text-right">
                                        <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden" id="modal_open">Detalles de la orden</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Andrew Mike</td>
                                    <td>Develop</td>
                                    <td>€ 99,225</td>
                                    <td class="text-right">2013</td>
                                    <td class="td-actions text-right">
                                        <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden" id="modal_open">
                                            Detalles de la orden
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>John Doe</td>
                                    <td>Design</td>
                                    <td>€ 89,241</td>
                                    <td class="text-right">2012</td>
                                    <td class="td-actions text-right">
                                        <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden" id="modal_open">Detalles de la orden</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alex Mike</td>
                                    <td>Design</td>
                                    <td>€ 92,144</td>
                                    <td class="text-right">2010</td>
                                    <td class="td-actions text-right">
                                        <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden" id="modal_open">Detalles de la orden</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mike Monday</td>
                                    <td>Marketing</td>
                                    <td>€ 49,990</td>
                                    <td class="text-right">2009</td>
                                    <td class="td-actions text-right">
                                        <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden" id="modal_open">Detalles de la orden</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Paul Dickens</td>
                                    <td>Communication</td>
                                    <td>€ 69,201</td>
                                    <td class="text-right">2008</td>
                                    <td class="td-actions text-right">
                                        <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden" id="modal_open">Detalles de la orden</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Andrew Mike</td>
                                    <td>Develop</td>
                                    <td>€ 99,225</td>
                                    <td class="text-right">2013</td>
                                    <td class="td-actions text-right">
                                        <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden" id="modal_open">
                                            Detalles de la orden
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>John Doe</td>
                                    <td>Design</td>
                                    <td>€ 89,241</td>
                                    <td class="text-right">2012</td>
                                    <td class="td-actions text-right">
                                        <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden" id="modal_open">Detalles de la orden</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alex Mike</td>
                                    <td>Design</td>
                                    <td>€ 92,144</td>
                                    <td class="text-right">2010</td>
                                    <td class="td-actions text-right">
                                        <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden" id="modal_open">Detalles de la orden</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mike Monday</td>
                                    <td>Marketing</td>
                                    <td>€ 49,990</td>
                                    <td class="text-right">2009</td>
                                    <td class="td-actions text-right">
                                        <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden" id="modal_open">Detalles de la orden</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Paul Dickens</td>
                                    <td>Communication</td>
                                    <td>€ 69,201</td>
                                    <td class="text-right">2008</td>
                                    <td class="td-actions text-right">
                                        <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden" id="modal_open">Detalles de la orden</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
dashboardTemplate::dashModalOrden();
dashboardTemplate::dashEnd();
?>
