@extends('layouts.app')
@section('title','Recherche')
@section('content')
        <header>
            <!-- <a href="{{ route('bouteille.index') }}" class="btn-arrow-top">
                <svg width="19" height="16" viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.4247 7C17.977 7 18.4247 7.44772 18.4247 8C18.4247 8.55228 17.977 9 17.4247 9L17.4247 7ZM0.498398 8.70711C0.107874 8.31658 0.107874 7.68342 0.498398 7.29289L6.86236 0.928933C7.25288 0.538409 7.88605 0.538409 8.27657 0.928933C8.6671 1.31946 8.6671 1.95262 8.27657 2.34315L2.61972 8L8.27657 13.6569C8.6671 14.0474 8.6671 14.6805 8.27657 15.0711C7.88605 15.4616 7.25288 15.4616 6.86236 15.0711L0.498398 8.70711ZM17.4247 9L1.20551 9L1.20551 7L17.4247 7L17.4247 9Z" fill="black"/>
                </svg>
                bouteilles
            </a> --> 
            <!-- pas de lien retour parce que cette page peut être accessible de accueil, cellier/show, liste/show et bouteilles/index  -->
            fiche bouteille
        </header>
        <main class="nav-margin">
            <section class="card-bouteille fiche-main-info {{ $bouteille->couleur == 'Blanc' ? 'bg-jaune' : ($bouteille->couleur == 'Rouge' ? 'bg-rouge' : ($bouteille->couleur == 'Rosé' ? 'bg-rose' : '')) }}">
                <picture class="fiche-picture" id="zoomableImage">
                    <img src="{{ $bouteille->srcImage }}" alt="{{ $bouteille->nom }}" class="zoomable-image">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.25 9.75H9.75M9.75 9.75H12.25M9.75 9.75V7.25M9.75 9.75V12.25" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 16L21 21" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M1 9.75C1 14.5825 4.91751 18.5 9.75 18.5C12.1704 18.5 14.3614 17.5173 15.9454 15.929C17.524 14.3461 18.5 12.162 18.5 9.75C18.5 4.91751 14.5825 1 9.75 1C4.91751 1 1 4.91751 1 9.75Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </picture>
                <div class="card-bouteille-content">
                    <div class="card-bouteille-info">
                            <h2>{{ $bouteille->nom}}</h2>
                        <span>{{$bouteille->type}} | {{ $bouteille->format }} | {{$bouteille->pays}}</span>
                        <p>{{$bouteille->prix}}  $</p>
                    </div>
                    @if(!Auth::user()->hasRole("Admin"))
                    <a href="#" class="btn-ajouter" data-bouteille-id="{{ $bouteille->id }}">+ Ajouter</a>
                    @endif
                </div>
            </section>
            <table>
                <tbody>
                    <tr>
                        <th>Producteur</th>
                        <td>{{$bouteille->producteur ?? '-'}}</td>
                    </tr>
                    <tr>
                        <th>Région</th>
                        <td>{{$bouteille->region ?? '-'}}</td>
                    </tr>
                    <tr>
                        <th>Désignation réglementée</th>
                        <td>{{$bouteille->designation ?? '-'}}</td>
                    </tr>
                    <tr>
                        <th>Agent promotionnel</th>
                        <td>{{$bouteille->agentPromotion ?? '-'}}</td>
                    </tr>
                    <tr>
                        <th>Cépage</th>
                        <td>{{ $bouteille->cepage ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Degré d'alcool</th>
                        <td>{{$bouteille->degre ?? '-'}}</td>
                    </tr>
                    <tr>
                        <th>Taux de sucre</th>
                        <td>{{$bouteille->tauxSucre ?? '-'}}</td>
                    </tr>
                    <!-- <tr>
                        <th>Appellation</th>
                        <td>{{ $bouteille->nom ?? '-'}}</td>
                    </tr>
                        <tr>
                        <th>Millésime</th>
                        <td>{{$bouteille->millesime ?? '-'}}</td>
                    </tr> -->
                    <!-- <tr>
                        <th>Couleur</th>
                        <td>{{$bouteille->couleur ?? '-'}}</td>
                    </tr> -->

                    <!-- <tr>
                        <th>Type</th>
                        <td>{{$bouteille->type ?? '-'}}</td>
                    </tr> -->
                    <!-- <tr>
                        <th>Pastille de goût</th>
                        <td>{{$bouteille->pastilleGoutTitre ?? '-'}}</td>
                    </tr> -->
                    <tr>
                        <th>Disponibilité</th>
                        <td>            
                            <!-- <p>Consulter ce lien externe SAQ: <br> -->
                            <a href="{{ $bouteille->lienProduit }}" class="link" target="_blank">
                                lien produit SAQ
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.85709 0.642858C6.85709 0.472361 6.92482 0.308848 7.04538 0.188289C7.16594 0.0677295 7.32945 0 7.49995 0L11.3571 0C11.5337 0 11.694 0.0711429 11.8105 0.186857L11.8114 0.188572L11.8131 0.189429C11.933 0.309836 12.0002 0.472924 12 0.642858V4.50001C12 4.6705 11.9322 4.83401 11.8117 4.95457C11.6911 5.07513 11.5276 5.14286 11.3571 5.14286C11.1866 5.14286 11.0231 5.07513 10.9025 4.95457C10.782 4.83401 10.7142 4.6705 10.7142 4.50001V2.19429L5.38281 7.52572C5.26094 7.63928 5.09976 7.7011 4.93321 7.69816C4.76667 7.69522 4.60777 7.62775 4.48999 7.50997C4.3722 7.39219 4.30474 7.23328 4.3018 7.06674C4.29886 6.9002 4.36068 6.73901 4.47423 6.61715L9.80567 1.28572H7.49995C7.32945 1.28572 7.16594 1.21799 7.04538 1.09743C6.92482 0.976868 6.85709 0.813354 6.85709 0.642858Z" fill="black" stroke="black" stroke-width="0.000359551"/>
                                    <path d="M1.92857 3.00007C1.75808 3.00007 1.59456 3.0678 1.474 3.18836C1.35344 3.30892 1.28572 3.47243 1.28572 3.64293V10.0715C1.28572 10.4264 1.57372 10.7144 1.92857 10.7144H8.35715C8.52765 10.7144 8.69116 10.6466 8.81172 10.5261C8.93228 10.4055 9.00001 10.242 9.00001 10.0715V6.64293C9.00001 6.47244 9.06774 6.30892 9.1883 6.18836C9.30886 6.0678 9.47237 6.00007 9.64287 6.00007C9.81336 6.00007 9.97688 6.0678 10.0974 6.18836C10.218 6.30892 10.2857 6.47244 10.2857 6.64293V10.0715C10.2857 10.583 10.0825 11.0735 9.72086 11.4352C9.35918 11.7969 8.86864 12.0001 8.35715 12.0001H1.92857C1.41708 12.0001 0.926544 11.7969 0.564866 11.4352C0.203188 11.0735 0 10.583 0 10.0715V3.64293C0 3.13144 0.203188 2.6409 0.564866 2.27922C0.926544 1.91754 1.41708 1.71436 1.92857 1.71436H5.35715C5.52764 1.71436 5.69116 1.78208 5.81172 1.90264C5.93228 2.0232 6.00001 2.18672 6.00001 2.35721C6.00001 2.52771 5.93228 2.69122 5.81172 2.81178C5.69116 2.93234 5.52764 3.00007 5.35715 3.00007H1.92857Z" fill="black" stroke="black" stroke-width="0.000359551"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            @if(!Auth::user()->hasRole("Admin"))
            @if(!$commentaire)
            <section>
                <h2>Ajouter une note</h2>
                <form action="{{ route('comment.store', ['bouteille_id' => $bouteille->id]) }}" method="post" id="comment">
                    @csrf
                    <div class="form-input-container">
                        <label for="comment"></label>
                        <input type="text" id="body" name="comment" placeholder="NOTE">
                        @error('comment')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-button">
                        <button type="submit" class="btn-submit">ajouter</button>
                    </div>
                </form>
            </section>
            @else
            <section class="fiche-note-container">
                <h2>Note</h2>
                @if(session()->has('successMessage'))
                <div id="snackbar">
                    <svg width="35" height="34" viewBox="0 0 46 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M39.3583 19.0013C40.6562 21.6749 40.9157 24.4263 40.1111 27.2816C39.9813 27.7747 39.7477 28.2679 39.5141 28.7092C38.0864 31.1751 35.8282 31.4087 33.9334 29.2802C31.9347 27.0479 31.156 24.3744 31.13 20.8702C31.0781 19.832 31.3896 18.3265 32.1943 16.9508C33.1806 15.2376 34.8938 14.7963 36.6069 15.8087C37.8528 16.5874 38.7354 17.7035 39.3583 19.0013ZM35.6984 19.6243C35.7244 18.4563 34.9457 17.3142 34.167 17.392C33.1027 17.4959 32.921 18.2746 32.947 19.183C32.973 20.3511 33.5959 21.2596 34.4525 21.2336C35.5167 21.2077 35.6984 20.4549 35.6984 19.6243Z" fill="black"/>
                        <path d="M23.4728 29.4362C23.4209 32.6289 22.6422 35.4062 20.7733 37.8202C17.8142 41.6099 13.0382 42.2329 9.14468 39.4295C5.66647 36.9636 3.87545 33.5374 3.4861 29.3583C3.22653 26.5809 3.3044 23.8555 4.47246 21.2079C7.27579 14.9523 14.2582 13.7064 19.0342 18.5603C22.0712 21.6751 23.395 25.361 23.4728 29.4362ZM18.1776 33.9786C19.4236 32.577 19.8908 30.9157 19.8389 29.0728C19.761 25.8282 18.8785 22.8691 16.6462 20.4032C13.8429 17.3403 9.63786 17.8335 7.84684 21.4415C5.71838 25.7503 7.48344 32.2136 11.5067 34.8611C13.8429 36.3666 16.3607 36.0292 18.1776 33.9786Z" fill="white"/>
                        <path d="M11.3772 20.4551C12.4154 20.481 13.4797 21.8048 13.4537 23.0508C13.4278 24.1929 12.675 24.9975 11.6627 24.9975C10.5206 24.9975 9.48233 23.8035 9.50829 22.5316C9.53425 21.3895 10.3908 20.4551 11.3772 20.4551Z" fill="white"/>
                        <path d="M34.1932 17.4182C34.9719 17.3403 35.7247 18.4564 35.7247 19.6504C35.7247 20.4811 35.543 21.2338 34.4788 21.2598C33.6222 21.2857 32.9992 20.3772 32.9733 19.2092C32.9473 18.3007 33.103 17.522 34.1932 17.4182Z" fill="white"/>
                        <path d="M43.7192 25.7502C43.7451 27.7489 43.226 30.1629 41.8762 32.3692C39.9554 35.51 36.3215 36.0291 33.622 33.5373C31.9867 32.0318 31.0263 30.1369 30.3774 28.0344C29.4689 25.1013 29.2612 22.1163 29.6765 19.0794C29.7804 18.3526 29.9621 17.6258 30.2216 16.9509C31.9088 12.2527 36.2696 11.3442 39.7737 14.9782C42.5251 17.8075 43.6932 21.2597 43.7192 25.7502ZM40.1112 27.3076C40.9158 24.4524 40.6563 21.675 39.3584 19.0274C38.7355 17.7296 37.8529 16.6135 36.581 15.8607C34.8679 14.8484 33.1547 15.2897 32.1684 17.0028C31.3637 18.3785 31.0522 19.884 31.1042 20.9223C31.1301 24.4265 31.9348 27.1 33.9075 29.3323C35.8023 31.4607 38.0606 31.2012 39.4882 28.7612C39.7737 28.2681 39.9814 27.8008 40.1112 27.3076Z" fill="white"/>
                        <path d="M25.9648 29.8774C25.835 33.5893 24.9265 37.1453 22.201 40.2342C19.0862 43.7643 13.5055 44.8285 9.3005 42.6741C4.93976 40.4418 2.68152 36.756 1.48751 32.1616C0.682849 29.0468 0.864546 25.9839 1.51347 22.947C2.34408 19.2352 4.44658 16.328 7.76905 14.4331C11.6366 12.2009 17.3471 13.3949 20.7474 16.8212C24.3554 20.3772 25.835 24.738 25.9648 29.8774ZM20.7474 37.8202C22.6163 35.4322 23.395 32.6288 23.4469 29.4362C23.3691 25.361 22.0453 21.6751 19.0343 18.5862C14.2582 13.7064 7.27587 14.9523 4.47254 21.2338C3.30448 23.8555 3.22661 26.6069 3.48618 29.3842C3.84957 33.5633 5.66655 36.9636 9.1188 39.4555C13.0383 42.2329 17.7884 41.6099 20.7474 37.8202Z" fill="black"/>
                        <path d="M41.5389 5.91922C41.6427 6.54219 41.5648 7.1392 40.9678 7.52855C40.3708 7.9179 39.8257 7.78811 39.3066 7.3728C37.4636 5.97114 35.5428 4.80308 33.1289 4.62138C31.0264 4.43969 30.1698 5.01074 29.5728 7.06132C29.3132 7.9179 28.8979 8.72256 27.8596 8.74852C26.8733 8.77447 26.3022 8.0996 25.9388 7.26898C25.1601 5.452 26.1984 2.46697 28.0154 1.35083C29.5209 0.416389 31.1561 -0.0248758 33.5701 0.00108098C36.4513 0.312562 39.3585 1.6104 41.1236 4.855C41.3052 5.16648 41.461 5.52987 41.5389 5.91922Z" fill="black"/>
                        <path d="M19.8393 29.0728C19.8912 30.9157 19.424 32.577 18.178 33.9786C16.3351 36.0292 13.8432 36.3667 11.5331 34.8612C7.50979 32.2136 5.74473 25.7503 7.87319 21.4415C9.6642 17.8335 13.8692 17.3144 16.6725 20.4032C18.9048 22.8691 19.7873 25.8282 19.8393 29.0728ZM13.4539 23.0508C13.4799 21.8049 12.4156 20.4811 11.3774 20.4551C10.391 20.4292 9.53442 21.3896 9.50846 22.5317C9.48251 23.8036 10.5208 24.9716 11.6629 24.9976C12.6752 25.0235 13.4539 24.1929 13.4539 23.0508Z" fill="black"/>
                        <path d="M16.7241 7.84004C17.1135 8.77449 17.1914 9.70893 16.2569 10.4098C15.5301 10.9808 14.8033 11.0327 13.9987 10.4357C10.9358 8.20344 7.69119 8.61875 5.19934 11.5259C4.70616 12.1229 4.23894 12.7459 3.74576 13.3429C3.14875 14.0956 2.44792 14.6926 1.4356 14.2254C0.423288 13.7582 -0.0698898 12.9795 0.00798056 11.6297C0.189678 6.93155 6.21165 2.64869 11.3251 3.81674C13.7132 4.36183 15.7118 5.45202 16.7241 7.84004Z" fill="black"/>
                        <path d="M45.8995 23.6995C46.3148 27.5411 45.4322 31.0972 43.4336 34.4456C40.76 38.9102 34.1151 38.7544 30.8445 34.3418C28.0672 30.604 27.3144 25.9837 27.2365 21.0779C27.1587 19.0792 27.6778 16.4835 29.1054 14.1215C31.3377 10.4096 34.9457 9.73476 38.7613 11.5777C43.797 14.0176 45.3544 18.612 45.8995 23.6995ZM41.8762 32.3431C43.2259 30.1368 43.745 27.7228 43.7191 25.7241C43.6931 21.2596 42.5251 17.7814 39.7477 14.9261C36.2435 11.3181 31.8828 12.2007 30.1956 16.8988C29.962 17.5737 29.7543 18.3005 29.6505 19.0273C29.2352 22.0642 29.4429 25.0493 30.3514 27.9824C31.0003 30.0849 31.9607 31.9797 33.5959 33.4852C36.3214 36.003 39.9813 35.4839 41.8762 32.3431Z" fill="black"/>
                    </svg>
                    <span id="snackbar-message">{{ session('successMessage') }}</span>
                </div>
                    <script src="{{ asset('js/showToast.js')  }}"></script>
                @endif
                <div class="form-container">
                    <form action="{{ route('comment.update', ['commentaire' => $commentaire->id]) }}" method="post" id="comment">
                        @csrf
                        @method('put')
                        <div class="form-input-container">
                            <label for="comment"></label>
                            <input type="text" id="body" name="comment" value="{{ $commentaire->corps }}">
                            @error('comment')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <h3>Ajouté le: {{ $commentaire->updated_at->setTimezone('America/Toronto') }}</h3>
                        <div class="form-button">
                            <button type="submit" class="btn-submit">modifier</button>
                        </div>
                    </form> 
                </div>
                <form action="{{ route('comment.destroy', ['commentaire' => $commentaire->id]) }}" method="post" id="supprimerCommentaire">
                    @method('delete')
                    @csrf
                    <div class="form-button">
                        <button type="submit" form="supprimerCommentaire" class="link btn-supprimer">supprimer</button>
                    </div>
                </form>
            </section>
            <!-- Modale suppression -->
            <dialog id="modal-supprimer" class="modal">
                <h2>Suppression de la note</h2>
                <hr>
                <p>Êtes-vous certain de vouloir supprimer la note?</p>
                <form action="{{ route('comment.destroy', ['commentaire' => $commentaire->id]) }}" method="post" class="form-modal" id="supprimerCommentaire">
                    @csrf
                    @method('DELETE')
                    <div class="btn-modal-container">
                        <button type="submit" form="supprimerCommentaire" class="btn-modal-action btn-red">oui, supprimer</button>
                        <button class="btn-modal-cancel btn-green">annuler</button>
                    </div>
                </form>
            </dialog>
            <script src="{{ asset('js/modalSupprimer.js') }}"></script>
            @endif
            @endif

            <!-- Zoom de l'image (EN DEV - VICTOR) -->
            <dialog id="zoomModal" class="modal">
                <span class="modal-close" id="modalClose">×</span>
                <img src="{{ $bouteille->bigImageUrl() }}" alt="{{ $bouteille->nom }}" class="modal-content">
            </dialog>

                <dialog id="modal-ajouter" class="modal">
                    <h2>Confirmation d'ajout</h2>
                    <hr>
                    <form action="" class="form-modal" id="form-ajouter">
                            <div class="form-radio">
                                <input type="radio" id="location-cellier" name="location" checked >
                                <label for="location-cellier">Celliers</label><br>
                            </div>
                            <div class="form-radio">
                                <input type="radio" id="location-liste" name="location">
                                <label for="location-liste">Listes</label>
                            </div>
                            <div class="form-input-container">
                                <label for="select-location" id="label-location">Choisir le cellier</label>
                                <select name="select-location" id="select-location">
                                    @forelse ($celliers as $cellier)
                                        <option value="{{ $cellier->id }}">{{ $cellier->nom }}</option>
                                    @empty 
                                        <option value="">Vous n'avez aucun cellier</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="card-bouteille-qt">
                                <button class="btn-decrement">-</button>
                                <input type="text" value="1" min="1" id="quantite-bouteille" readonly>
                                <button class="btn-increment">+</button>
                            </div>
                            <div class="btn-modal-container">
                                <button class="btn-modal-action">ajouter</button>
                                <button class="btn-modal-cancel">annuler</button>
                            </div>
                    </form>
                </dialog>
            


            <script src="../../js/bottleCounterModal.js"></script>
            <script src="../../js/modalAjouter.js"></script>

            <script src="{{ asset('js/zoom.js')  }}"></script>
        </main>
        @endsection
