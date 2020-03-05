<?php
require_once('core/helpers/dashboard_template.php');
dashboardTemplate::dashHead('Ordenes');
dashboardTemplate::dashMenu();
?>

<main>
    <div class="container-fluid position-absolute dash__main">
        <div class="row mx-0 my-2">
            <div class="dash__main_card col-12">
                <div class="col-md-12 col-lg-12">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a href="#nav-ordenes" class="nav-item nav-link active" id="nav-ordenes-tab" data-toggle="tab" role="tab" aria-controls="nav-ordenes" aria-selected="true">
                                <p class="dash__main_title dash__ord_title">Ordenes</p>
                            </a>
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-ordenes" role="tabpanel" aria-labelledby="nav-ordenes-tab">
                            <div class="table-responsive">
                                <table class="table dash__main_table" id="table">
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
                                                <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden">
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
                                                <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden">Detalles de la orden</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alex Mike</td>
                                            <td>Design</td>
                                            <td>€ 92,144</td>
                                            <td class="text-right">2010</td>
                                            <td class="td-actions text-right">
                                                <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden">Detalles de la orden</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mike Monday</td>
                                            <td>Marketing</td>
                                            <td>€ 49,990</td>
                                            <td class="text-right">2009</td>
                                            <td class="td-actions text-right">
                                                <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden">Detalles de la orden</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Paul Dickens</td>
                                            <td>Communication</td>
                                            <td>€ 69,201</td>
                                            <td class="text-right">2008</td>
                                            <td class="td-actions text-right">
                                                <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden">Detalles de la orden</button>
                                            </td>
                                        </tr>
                                        <td>Andrew Mike</td>
                                        <td>Develop</td>
                                        <td>€ 99,225</td>
                                        <td class="text-right">2013</td>
                                        <td class="td-actions text-right">
                                            <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden">
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
                                                <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden">Detalles de la orden</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alex Mike</td>
                                            <td>Design</td>
                                            <td>€ 92,144</td>
                                            <td class="text-right">2010</td>
                                            <td class="td-actions text-right">
                                                <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden">Detalles de la orden</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mike Monday</td>
                                            <td>Marketing</td>
                                            <td>€ 49,990</td>
                                            <td class="text-right">2009</td>
                                            <td class="td-actions text-right">
                                                <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden">Detalles de la orden</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Paul Dickens</td>
                                            <td>Communication</td>
                                            <td>€ 69,201</td>
                                            <td class="text-right">2008</td>
                                            <td class="td-actions text-right">
                                                <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden">Detalles de la orden</button>
                                            </td>
                                        </tr>
                                        <td>Andrew Mike</td>
                                        <td>Develop</td>
                                        <td>€ 99,225</td>
                                        <td class="text-right">2013</td>
                                        <td class="td-actions text-right">
                                            <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden">
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
                                                <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden">Detalles de la orden</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alex Mike</td>
                                            <td>Design</td>
                                            <td>€ 92,144</td>
                                            <td class="text-right">2010</td>
                                            <td class="td-actions text-right">
                                                <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden">Detalles de la orden</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mike Monday</td>
                                            <td>Marketing</td>
                                            <td>€ 49,990</td>
                                            <td class="text-right">2009</td>
                                            <td class="td-actions text-right">
                                                <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden">Detalles de la orden</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Paul Dickens</td>
                                            <td>Communication</td>
                                            <td>€ 69,201</td>
                                            <td class="text-right">2008</td>
                                            <td class="td-actions text-right">
                                                <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden">Detalles de la orden</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade dash__antiover" id="orden" tabindex="-1" role="dialog" aria-labelledby="orden" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom mw-100 w-50" role="document">
        <div class="modal-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h3 class="dash__modal_title">Orden No. 1</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <p class="dash__modal_field">Cliente</p>
                            </div>
                            <div class="col-8">
                                <p>Grand Marshal</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p class="dash__modal_field">Email</p>
                            </div>
                            <div class="col-8">
                                <p>grandmarshal@gmail.com</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p class="dash__modal_field">Teléfono</p>
                            </div>
                            <div class="col-8">
                                <p>01718332233</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <p class=" dash__modal_field">Dirección</p>
                            </div>
                            <div class="col-8">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae beatae
                                    consequatur eveniet culpa omnis obcaecati quibusdam, sint dolore.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <table>
                    <table class="table table-borderless">
                        <thead>
                            <tr class="dash_modal_thead">
                                <th scope="col">No.</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Pencil (2B)</td>
                                <td>1 Dozen</td>
                                <td>$9.99</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Sharpner</td>
                                <td>1 single</td>
                                <td>$15.99</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Drawing Paper</td>
                                <td>1 quire</td>
                                <td>$89.99</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>CAT5 Cable</td>
                                <td>2 meter</td>
                                <td>$99.99</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Sticky Notes</td>
                                <td>2 packet</td>
                                <td>$349.99</td>
                            </tr>
                        </tbody>
                    </table>
                </table>
            </div>
            <div class="dash__modal_bottom">
                <div class="row">
                    <div class="col-6 my-3">
                        <div class="row">
                            <div class="col-5">
                                <p class="dash__modal_field">Fecha de compra</p>
                            </div>
                            <div class="col-7">
                                <p>07/02/2020</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <p class="dash__modal_field">Fecha de entrega</p>
                            </div>
                            <div class="col-7">
                                <p>08/02/2020</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 my-4">
                        <div class="row">
                            <div class="col-8 text-right">
                                <p class="dash__modal_field">Subtotal
                                </p>
                            </div>
                            <div class="col-4">
                                <p>$565.95
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8 text-right">
                                <p class="dash__modal_field">IVA (13%)
                                </p>
                            </div>
                            <div class="col-4">
                                <p>$73.58
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8 text-right">
                                <p class="dash__modal_field">Total (+IVA)
                                </p>
                            </div>
                            <div class="col-4">
                                <p>$639.53
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dash__modal_footer text-right mr-4">
                <button type="button" class="ml-auto btn dash__modal_deny" data-dismiss="modal">Rechazar orden</button>
                <button type="button" class="btn dash__modal_accept">Finalizar Orden</button>
            </div>
        </div>
    </div>
</div>

<?php
dashboardTemplate::dashEnd();
?>
