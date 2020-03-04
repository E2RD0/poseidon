<?php
require_once('core/helpers/dashboard_template.php');
dashboardTemplate::dashHead('Dashboard');
dashboardTemplate::dashMenu();
?>

<main>
    <div class="container-fluid dash__main">
        <div class="row mx-0">
            <div class="col-12 bg-info">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi vel ab odio quod iste similique alias deleniti pariatur nostrum minima quam, atque rem ut, accusamus officiis voluptatum consequatur nihil nobis?
            </div>
        </div>
        <div class="row my-4">
            <div class="col-6">
                <div class="col-12 bg-info">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, saepe? Quisquam, ratione! Consequatur iste maxime incidunt. Expedita quod quisquam minus cumque excepturi. Ullam ex modi, illum blanditiis commodi quod a?
                </div>
            </div>
            <div class="col-6">
                <div class="col-12 bg-info">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum veniam alias minima eaque nemo nostrum similique expedita vel eos, molestiae vero soluta unde quam consectetur voluptates autem, natus reprehenderit earum.
                </div>
            </div>
        </div>
    </div>
</main>

<?php
dashboardTemplate::dashEnd();
?>
