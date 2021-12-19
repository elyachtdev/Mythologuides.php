<section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php foreach ($data as $value) {?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">À lire</div>
                            
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Article name-->
                                    <?= "<h5 class='fw-bolder'>". htmlspecialchars($value->article_title) . "</h5>" ?>
                                    <!-- Article price-->
                                    <?= htmlspecialchars($value->article_desc)?>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <span class="text-muted text-decoration-line-through">Bientôt</span>
                                Disponible
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="articleReading-view.html.php?id=<?= $value->article_id?>">Lire l'article</a></div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    }
                    ?>
                    <!-- <div class="col mb-5">
                        <div class="card h-100">
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">À lire</div>
                            <img class="card-img-top" src="https://img2.freepng.fr/20180510/hie/kisspng-medusa-perseus-gorgon-greek-mythology-zeus-5af3da614c23d0.0900227115259305933119.jpg" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">Articles</h5>
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <span class="text-muted text-decoration-line-through">Bientôt</span>
                                    Disponible
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Lire l'article</a></div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        