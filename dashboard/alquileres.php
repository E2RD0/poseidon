<?php
require_once('core/helpers/dashboard_template.php');
dashboardTemplate::dashHead('Alquileres');
dashboardTemplate::dashMenu('alquileres');
?>

<main>
    <div class="container-fluid position-absolute dash__main">
        <div class="row mx-0 my-2">
            <div class="dash__main_card col-12">
                <div class="col-md-12 col-lg-12 p-0">
                    <ul class="nav nav-categorias" role="tablist">
                        <li class="nav-item">
                            <a
                                data-toggle="tab"
                                href="#alquileres"
                                class="nav-link active dash__tab_title"
                                aria-expanded="true">Alquileres</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane active py-3 px-3 px-sm-0" id="alquileres" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table dash__main_table w-100" id="table">
                            <thead>
                                <tr>
                                    <th>Nombre del cliente</th>
                                    <th>Dirección</th>
                                    <th>Precio de alquiler</th>
                                    <th class="text-right">No. de alquiler</th>
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
                                        <button
                                            class="btn dash__table_button"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#alquiler"
                                            id="modal_open">
                                            Detalles de la alquiler
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>John Doe</td>
                                    <td>Design</td>
                                    <td>€ 89,241</td>
                                    <td class="text-right">2012</td>
                                    <td class="td-actions text-right">
                                        <button
                                            class="btn dash__table_button"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#alquiler"
                                            id="modal_open">Detalles de la alquiler</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alex Mike</td>
                                    <td>Design</td>
                                    <td>€ 92,144</td>
                                    <td class="text-right">2010</td>
                                    <td class="td-actions text-right">
                                        <button
                                            class="btn dash__table_button"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#alquiler"
                                            id="modal_open">Detalles de la alquiler</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mike Monday</td>
                                    <td>Marketing</td>
                                    <td>€ 49,990</td>
                                    <td class="text-right">2009</td>
                                    <td class="td-actions text-right">
                                        <button
                                            class="btn dash__table_button"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#alquiler"
                                            id="modal_open">Detalles de la alquiler</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Paul Dickens</td>
                                    <td>Communication</td>
                                    <td>€ 69,201</td>
                                    <td class="text-right">2008</td>
                                    <td class="td-actions text-right">
                                        <button
                                            class="btn dash__table_button"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#alquiler"
                                            id="modal_open">Detalles de la alquiler</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Andrew Mike</td>
                                    <td>Develop</td>
                                    <td>€ 99,225</td>
                                    <td class="text-right">2013</td>
                                    <td class="td-actions text-right">
                                        <button
                                            class="btn dash__table_button"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#alquiler"
                                            id="modal_open">
                                            Detalles de la alquiler
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>John Doe</td>
                                    <td>Design</td>
                                    <td>€ 89,241</td>
                                    <td class="text-right">2012</td>
                                    <td class="td-actions text-right">
                                        <button
                                            class="btn dash__table_button"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#alquiler"
                                            id="modal_open">Detalles de la alquiler</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alex Mike</td>
                                    <td>Design</td>
                                    <td>€ 92,144</td>
                                    <td class="text-right">2010</td>
                                    <td class="td-actions text-right">
                                        <button
                                            class="btn dash__table_button"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#alquiler"
                                            id="modal_open">Detalles de la alquiler</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mike Monday</td>
                                    <td>Marketing</td>
                                    <td>€ 49,990</td>
                                    <td class="text-right">2009</td>
                                    <td class="td-actions text-right">
                                        <button
                                            class="btn dash__table_button"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#alquiler"
                                            id="modal_open">Detalles de la alquiler</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Paul Dickens</td>
                                    <td>Communication</td>
                                    <td>€ 69,201</td>
                                    <td class="text-right">2008</td>
                                    <td class="td-actions text-right">
                                        <button
                                            class="btn dash__table_button"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#alquiler"
                                            id="modal_open">Detalles de la alquiler</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Andrew Mike</td>
                                    <td>Develop</td>
                                    <td>€ 99,225</td>
                                    <td class="text-right">2013</td>
                                    <td class="td-actions text-right">
                                        <button
                                            class="btn dash__table_button"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#alquiler"
                                            id="modal_open">
                                            Detalles de la alquiler
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>John Doe</td>
                                    <td>Design</td>
                                    <td>€ 89,241</td>
                                    <td class="text-right">2012</td>
                                    <td class="td-actions text-right">
                                        <button
                                            class="btn dash__table_button"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#alquiler"
                                            id="modal_open">Detalles de la alquiler</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alex Mike</td>
                                    <td>Design</td>
                                    <td>€ 92,144</td>
                                    <td class="text-right">2010</td>
                                    <td class="td-actions text-right">
                                        <button
                                            class="btn dash__table_button"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#alquiler"
                                            id="modal_open">Detalles de la alquiler</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mike Monday</td>
                                    <td>Marketing</td>
                                    <td>€ 49,990</td>
                                    <td class="text-right">2009</td>
                                    <td class="td-actions text-right">
                                        <button
                                            class="btn dash__table_button"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#alquiler"
                                            id="modal_open">Detalles de la alquiler</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Paul Dickens</td>
                                    <td>Communication</td>
                                    <td>€ 69,201</td>
                                    <td class="text-right">2008</td>
                                    <td class="td-actions text-right">
                                        <button
                                            class="btn dash__table_button"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#alquiler"
                                            id="modal_open">Detalles de la alquiler</button>
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

<div
class="modal fade dash__full"
id="alquiler"
tabindex="-1"
role="dialog"
aria-labelledby="alquiler"
aria-hidden="true"
data-backdrop="static">
<div
class="modal-dialog modal-dialog-centered modal-dialog-zoom mw-100 w-75"
role="document"
id="check_mq">
<div class="modal-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex flex-row justify-content-between mt-4 m-1">
                <h3 class="dash__modal_title p-0 ml-4">Alquiler No. 1</h3>
                <button
                    type="button"
                    class="close mr-5"
                    data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fas fa-times p-1"></i>
                    </span>
                </button>
            </div>
        </div>
        <div class="row m-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <p class="dash__modal_field">Cliente</p>
                    </div>
                    <div class="col-8">
                        <p>Grand Marshal</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p class="dash__modal_field">Email</p>
                    </div>
                    <div class="col-8">
                        <p>grandmarshal@gmail.com</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p class="dash__modal_field">Teléfono</p>
                    </div>
                    <div class="col-8">
                        <p>01718332233</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <p class=" dash__modal_field">Sucursal</p>
                    </div>
                    <div class="col-md-8">
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
                <div class="row flex-wrap">
                    <div class="col-md-5 col-6">
                        <p class="dash__modal_field">Fecha de alquiler</p>
                    </div>
                    <div class="col-md-7 col-6">
                        <p>10/02/2020</p>
                    </div>
                </div>
                <div class="row flex-wrap">
                    <div class="col-md-5 col-6">
                        <p class="dash__modal_field">Fecha de devolución</p>
                    </div>
                    <div class="col-md-7 col-6">
                        <p>09/02/2020</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center m-4">
        <table
            class="table table-borderless table-responsive w-100 d-block d-md-table"
            id="table">
            <thead>
                <tr class="dash_modal_thead">
                    <th scope="col">No.</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio de alquiler</th>
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
    </div>
    <div class="dash__modal_bottom">
        <div class="row m-3">
            <div class="col-md-6 my-3">
                <div class="row flex-wrap">
                    <div class="col-md-5 col-6">
                        <p class="dash__modal_field">Fecha de compra</p>
                    </div>
                    <div class="col-md-7 col-6">
                        <p>07/02/2020</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 my-3">
                <div class="row">
                    <div class="col-md-8 col-6 dash__align">
                        <p class="dash__modal_field">Subtotal
                        </p>
                    </div>
                    <div class="col-md-4 col-6">
                        <p>$565.95
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-6 dash__align">
                        <p class="dash__modal_field">IVA (13%)
                        </p>
                    </div>
                    <div class="col-md-4 col-6">
                        <p>$73.58
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-6 dash__align">
                        <p class="dash__modal_field">Total (+IVA)
                        </p>
                    </div>
                    <div class="col-md-4 col-6">
                        <p>$639.53
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dash__modal_footer mr-4">
        <button type="button" class="ml-auto btn dash__modal_deny" data-dismiss="modal">Rechazar alquiler</button>
        <button type="button" class="btn dash__modal_accept">Finalizar alquiler</button>
    </div>
</div>
</div>
</div>

<?php
dashboardTemplate::dashEnd();
?>
