@extends('layouts.app')
@section('content')

    <div role="main" class="main">
        <section
            class="section section-concept section-no-border section-dark section-angled section-angled-reverse pt-5 m-0"
            style="background-image: url({{asset('img/landing/header_bg.jpg')}}); background-size: cover; background-position: center; min-height: 645px;">
            <div class="section-angled-layer-bottom section-angled-layer-increase-angle bg-light"
                 style="padding: 8rem 0;"></div>
            <div class="container pt-lg-5 mt-5">
                <div class="row pt-3 pb-lg-0 pb-xl-0">
                    <div class="col-lg-6 pt-4 mb-5 mb-lg-0">
                        <h1 class="font-weight-bold text-10 text-xl-12 line-height-2 mb-3">Création d'une association
                            U.N.C</h1>
                        <p class="opacity-7 text-4 negative-ls-05 pb-2 mb-4">Un simple formulaire pour la création de
                            votre association U.N.C.</p>
                    </div>
                </div>
            </div>
        </section>

        <div id="examples" class="container py-2">
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="tab-pane tab-pane-navigation active" id="formsStyleWithIcons">
                        <h4 class="mb-3">Formulaire</h4>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <form class="contact-form form-with-icons" action="{{route('new.store')}}"
                                              method="POST">
                                            @csrf
                                            {{--                          <div class="contact-form-success alert alert-success d-none mt-4">
                                                                          <strong>Success!</strong> Your message has been sent to us.
                                                                      </div>
                                                                      <div class="contact-form-error alert alert-danger d-none mt-4">
                                                                          <strong>Error!</strong> There was an error sending your message.
                                                                          <span class="mail-error-message text-1 d-block"></span>
                                                                      </div>--}}

                                            @if($message = Session::get('success'))
                                                <div id="alert" class="alert alert-success alert-block">
                                                    <button type="button" class="btn-close"
                                                            onclick="document.getElementById('alert').style.display='none'"
                                                            data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                    <strong>{{$message}}</strong>
                                                </div>
                                            @elseif($message = Session::get('danger'))
                                                <div id="alert" class="alert alert-danger alert-block">
                                                    <button type="button" class="btn-close"
                                                            onclick="document.getElementById('alert').style.display='none'"
                                                            data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                    <strong>{{$message}}</strong>
                                                </div>
                                            @elseif($message = Session::get('error'))
                                                <div id="alert" class="alert alert-danger alert-block">
                                                    <button type="button" class="btn-close"
                                                            onclick="document.getElementById('alert').style.display='none'"
                                                            data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                    <strong>{{$message}}</strong>
                                                </div>
                                            @endif
                                            <div class="row">
                                                <div class="form-group col-lg-3">
                                                    <label class="form-label mb-1 text-2">N° RNA</label>
                                                    <div class="position-relative">
                                                        <i class="icons icon-note text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
                                                        <input id="rna" type="text" value="" maxlength="17"
                                                               class="form-control text-3 h-auto py-2" name="rna"
                                                               placeholder="Ex: W822002095"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-9">
                                                    <label class="form-label mb-1 text-2">Titre</label>
                                                    <div class="position-relative">
                                                        <i class="icons icon-user text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
                                                        <input id="name" type="text" value="" maxlength="100"
                                                               class="form-control text-3 h-auto py-2" name="name"
                                                               readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label class="form-label mb-1 text-2">Adresse</label>
                                                    <div class="position-relative">
                                                        <i class="icons icon-location-pin text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
                                                        <input id="address" type="text" value="" maxlength="100"
                                                               class="form-control text-3 h-auto py-2" name="address"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label class="form-label mb-1 text-2">Complément d'adresse</label>
                                                    <div class="position-relative">
                                                        <i class="icons icon-location-pin text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
                                                        <input id="address2" type="text" value="" maxlength="100"
                                                               class="form-control text-3 h-auto py-2" name="address2">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-4">
                                                    <label class="form-label mb-1 text-2">Code Postal</label>
                                                    <div class="position-relative">
                                                        <i class="icons icon-location-pin text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
                                                        <input id="zipcode" type="text" pattern="[0-9]{5}" value=""
                                                               maxlength="5" class="form-control text-3 h-auto py-2"
                                                               name="zipcode" required readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label class="form-label">Ville</label>
                                                    <div class="position-relative">
                                                        <i class="icons icon-location-pin text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50 z-index-1"></i>
                                                        <div class="custom-select-1">
                                                            <select id="cities" name="cities"
                                                                    class="form-select form-control h-auto" required>
                                                                <option value="">-- Choisir votre ville --</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-4">
                                                    <label class="form-label mb-1 text-2">Téléphone</label>
                                                    <div class="position-relative">
                                                        <i class="icons icon-phone text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
                                                        <input type="tel" id="phone" name="phone"
                                                               class="form-control text-3 h-auto py-2" required>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <legend class="col-form-label col-sm-2 pt-0">Type d'association</legend>
                                                <div class="col-lg-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="type"
                                                               id="gridRadios1" value="department">
                                                        <label class="form-check-label" for="gridRadios1">
                                                            Départementale
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="type"
                                                               id="gridRadios2" value="section">
                                                        <label class="form-check-label" for="gridRadios2">
                                                            Section Locale
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-4 assodepart" hidden>
                                                    <label class="form-label">Association départementale</label>
                                                    <div class="position-relative">
                                                        <i class="icons icon-location-pin text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50 z-index-1"
                                                           hidden></i>
                                                        <div class="custom-select-1">
                                                            <select id="assodepartement" name="assodepartement"
                                                                    class="form-select form-control h-auto">
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-4">
                                                    <label class="form-label mb-1 text-2">Logo</label>
                                                    <div class="position-relative">
                                                        <i class="icons icon-cloud-upload text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
                                                        <input type="file" id="logo" name="logo"
                                                               class="form-control text-3 h-auto py-2">
                                                    </div>
                                                </div>
                                                <div class="form-group col-4">
                                                    <div class="position-relative">
                                                        <img src="" id="img-logo" name="img-logo"
                                                             class="form-control text-3 h-auto py-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-4">
                                                    <label class="form-label mb-1 text-2">Email</label>
                                                    <div class="position-relative">
                                                        <i class="icons icon-envelope-letter text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
                                                        <input type="mail" id="mail" name="mail"
                                                               class="form-control text-3 h-auto py-2" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                               name="agree" id="agree" required>
                                                        <label class="form-check-label" for="agree">
                                                            Accepter les termes et conditions</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <input type="submit" value="Valider" class="btn btn-primary"
                                                           data-loading-text="Chargement...">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="section section-dark section-angled border-0 lazyload pb-0 m-0"
                 style="background-size: 100%; background-position: top;" data-bg-src="img/landing/build_bg.jpg">
            <div class="section-angled-layer-top section-angled-layer-increase-angle bg-color-light-scale-1"
                 style="padding: 4rem 0;"></div>
            <div class="container text-center my-5 py-5">
                <h2 class="font-weight-bold line-height-3 text-12 mt-5 mb-3 appear-animation"
                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250"
                    data-appear-animation-duration="750">Créer votre association U.N.C</h2>
                <h4 class="font-weight-bold text-9 mb-4 pb-2 appear-animation" data-appear-animation="fadeInUpShorter"
                    data-appear-animation-delay="500" data-appear-animation-duration="750">Pour seulement <span
                        class="highlighted-word highlighted-word-animation-1 highlighted-word-animation-1-no-rotate highlighted-word-animation-1 highlighted-word-animation-1-light alternative-font-4 font-weight-extra-bold text-4 light appear-animation"
                        data-appear-animation="blurIn" data-appear-animation-delay="800"
                        data-appear-animation-duration="750">2€/mois</span></h4>
                <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900"
                     data-appear-animation-duration="750">
                    <h4 class="font-weight-light text-4 col-lg-6 px-0 offset-lg-3 fw-400 mb-5 opacity-8">Vous aurez tout
                        les outils nécessaire pour gérer votre U.N.C</h4>
                </div>
                <div class="col-12 px-0 pb-2 mb-4">
                    <div class="row flex-column flex-lg-row justify-content-center">
                        <div class="col-auto">
                            <h5 class="font-weight-semibold text-4 positive-ls-2 appear-animation"
                                data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1100"
                                data-appear-animation-duration="750"><i class="fa fa-check"></i> COMPTABILITÉ
                            </h5>
                        </div>
                        <div class="col-auto mx-5 my-2 my-lg-0">
                            <h5 class="font-weight-semibold text-4 positive-ls-2 appear-animation"
                                data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1400"
                                data-appear-animation-duration="750"><i class="fa fa-check"></i> Gestions des membres
                            </h5>
                        </div>
                        <div class="col-auto">
                            <h5 class="font-weight-semibold text-4 positive-ls-2 appear-animation"
                                data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1600"
                                data-appear-animation-duration="750"><i class="fa fa-check"></i> Actualités
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>

    <script>

        const rna = document.getElementById('rna');
        rna.addEventListener('input', function (e) {
            let value = rna.value;
            urlrequest = "https://entreprise.data.gouv.fr/api/rna/v1/id/" + value;

            fetch(urlrequest)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('name').value = data.association.titre;
                    document.getElementById('address').value = data.association.adresse_gestion_libelle_voie;
                    document.getElementById('zipcode').value = data.association.adresse_gestion_code_postal;
                    document.getElementById('cities').value = data.association.adresse_gestion_acheminement;
                    document.getElementById('email').value = data.association.email;
                    document.getElementById('phone').value = data.association.telephone;
                    document.getElementById('website').value = data.association.site_internet;
                    document.getElementById('description').value = data.association.objet;
                });

            codePostal.addEventListener('change', () => {
                document.getElementById('cities').value = data.association.adresse_gestion_acheminement;
            });
        });
        rna.addEventListener('focus', () => {
            rna.style.border = '2px solid green';
        });
        rna.addEventListener('blur', () => {
            rna.style.border = '';

        });

        const select = document.getElementById("cities");
        select.addEventListener('focus', () => {

            const value = codePostal.value;
            select.innerHTML = '<option value="">-- Choisir votre ville --</option>';
            const data = "{{asset('laposte_hexasmal.json')}}";
            fetch(data)
                .then(response => response.json())
                .then(data => {
                    const results = data.filter(result => result.code_postal === value);
                    results.forEach(result => {
                        const city = {
                            nom_de_la_commune: result.nom_de_la_commune,
                            code_postal: result.code_postal
                        };
                        const option = document.createElement("option");
                        option.value = city.nom_de_la_commune;
                        option.text = `${city.nom_de_la_commune} (${city.code_postal})`;
                        select.add(option);
                    });
                })
                .catch(error => console.error(error));
        });

        const codePostal = document.getElementById('zipcode');
        codePostal.addEventListener('input', function (e) {
            const value = codePostal.value;
            select.innerHTML = '<option value="">-- Choisir votre ville --</option>';
            const data = "{{asset('laposte_hexasmal.json')}}";
            fetch(data)
                .then(response => response.json())
                .then(data => {
                    const results = data.filter(result => result.code_postal === value);
                    results.forEach(result => {
                        const city = {
                            nom_de_la_commune: result.nom_de_la_commune,
                            code_postal: result.code_postal
                        };
                        const option = document.createElement("option");
                        option.value = city.nom_de_la_commune;
                        option.text = `${city.nom_de_la_commune} (${city.code_postal})`;
                        select.add(option);
                    });
                })
                .catch(error => console.error(error));
        });
        codePostal.addEventListener('focus', () => {
            codePostal.style.border = '2px solid green';
        });
        codePostal.addEventListener('blur', () => {
            codePostal.style.border = '';

        });

        const titre = document.getElementById('titre');
        titre.addEventListener('focus', () => {
            name.style.border = '2px solid green';
        });
        titre.addEventListener('blur', () => {
            name.style.border = '';
        });

        const address = document.getElementById('address');
        address.addEventListener('focus', () => {
            address.style.border = '2px solid green';
        });
        address.addEventListener('blur', () => {
            address.style.border = '';
        });

        const address2 = document.getElementById('address2');
        address2.addEventListener('focus', () => {
            address2.style.border = '2px solid green';
        });
        address2.addEventListener('blur', () => {
            address2.style.border = '';
        });

        const logo = document.getElementById('logo');
        const img = document.getElementById('img-logo');

        logo.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.addEventListener('load', function () {
                    img.setAttribute('src', this.result);
                });
                reader.readAsDataURL(file);
            }
        });

        const agree = document.getElementById('agree');
        agree.addEventListener('change', function () {
            if (agree.checked) {
                agree.value = 1;
            } else {
                agree.value = 0;
            }
        });

        // A Optimiser
        const gridRadios2 = document.getElementById('gridRadios2');
        gridRadios2.addEventListener('change', function () {
            if (gridRadios2.checked) {
                let element = document.querySelector('.assodepart');
                element.removeAttribute('hidden');

                const association = <?php echo json_encode($association); ?>;
                const departments = association.filter(asso => asso.Type === 'department');
                const zipcode = document.getElementById('zipcode').value;
                const first2digitZipcode = zipcode.slice(0, 2);
                const departments2digit = departments.map(depart => depart.PostalCode.slice(0, 2));

                if (departments2digit.includes(first2digitZipcode)) {
                    const department = departments.filter(depart => depart.PostalCode.slice(0, 2) === first2digitZipcode);
                    const select = document.getElementById('assodepartement');
                    select.innerHTML = '<option value="">-- Choisir votre département --</option>';
                    department.forEach(depart => {
                        const option = document.createElement('option');
                        option.value = depart.Name;
                        option.text = depart.Name;
                        select.add(option);
                    });
                } else {
                    const select = document.getElementById('assodepartement');
                    select.innerHTML = '<option value="">-- Choisir votre département --</option>';
                    departments.forEach(depart => {
                        const option = document.createElement('option');
                        option.value = depart.Name;
                        option.text = depart.Name;
                        select.add(option);
                    });
                }
            }
        });

        const gridRadios1 = document.getElementById('gridRadios1');
        gridRadios1.addEventListener('change', function () {
            if (gridRadios1.checked) {
                console.log('Departement checked, add hidden');
                let element = document.querySelector('.assodepart');
                element.setAttribute('hidden', 'true');
            }
        });


    </script>

@endsection
