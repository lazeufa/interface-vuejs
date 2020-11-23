<?php require_once "inc/header.inc.php"; ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Vue.Js Hicham Hadjaj</title>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
             <!------------- Logo du site ------------------->
    <link rel="icon" href="./assets/img/Vue.js.png" type="image/png" />
    <!-- pour recurerer les Icons du site -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"/>
    <!-- Lien vers le fichier du style css  -->
    <link href="./assets/style/style.css" rel="stylesheet" />
  </head>

  <body>
      
    <!-- l'endroit des instructions de l'application. -->
    <div id="app">
      
          <!-- contenu de toute nos pages -->
      <router-view></router-view>
    </div>

      <!-- contenu qu'on peut recuprer dans template -->
    <script type="text/x-template" id="home">
       <!-- pour inserer du style -->
      <div class="home-container">
        <h1>Articles</h1>

        <!--search display / Affichage de imput recherche utilisateur -->
        <input v-model="searchKey" id="search" type="search" placeholder="Rechercher..." autocomplete="off">
        <!--  Condition:si dans la bare de recherche le il ya un elements, tu affiche le resultat -->
        <span v-if="searchKey && filteredList.length >= 1 ">
          <!-- Condition: si le resultas et superieur ou egal a 2 tu rajoute un S  -->
          {{filteredList.length}} resultat<span v-if="filteredList.length >= 2">s</span>
        </span>

       <!-- cards display / afiichage de la liste -->
        <div class="card-cart-container">
          <div class="card-container">
                   <!-- on fait une boucle for de produits filtrer dans products -->
            <div v-for="product in filteredList" class="card">

              <div class="img-container">
                  <!-- recuperation de l'image et affichage -->
                <img v-bind:src='product.img' />
              </div>
                <!-- affichage du texte dans l'image -->
              <div class="card-text">
                 <!-- recuparation des description a partir de la data base -->
                <h3>{{ product.description }}</h3>
                <!-- affichage du prix a partir de la data base -->
                <span>{{ product.price }}€</span>
              </div>

              <div class="card-icons">
                <!-- Boutton Like -->
                <div class="like-container">
                  <input
                    type="checkbox"
                    :value=product.id
                    name="checkbox"
                    v-bind:id="product.id"
                    v-model="liked"
                    @click="setLikeCookie()"
                  />
                   <!-- recuperation de des produits et affichage -->
                  <label v-bind:for="product.id">
                    <!-- Icones Coeur -->
                    <i class="fas fa-heart"></i>
                  </label>
                </div>

                <div class="add-to-cart">
                  <!-- Ajouter produit au panier -->
                  <button v-on:click="addToCart(product)">
                     <!-- Icones du chariot -->
                    <i class="fas fa-shopping-cart"></i>
                  </button>
                </div>
              </div>
            </div>

            <!-- no result message / S'il n'y a pas de resultat tu affiche le message suivant -->
            <div v-if="filteredList.length == []" class="no-result">
              <h3>Désolé</h3>
              <p>Aucun résultat trouvé</p>
            </div>
          </div>
          <!-- {{liked}} -->

          <!-- cart display //panier -->
          <transition name="cart-anim">
            <!-- Affichage du panier s'il y a au minimum un produit-->
            <div v-if="cart.length > 0" class="shopping-cart" id="shopping-cart">
              <h2>Panier</h2>
             <!-- transition du panier -->
              <transition-group name="item-anim" tag="div" class="item-group">
                <!-- boucle fort des produits pour la recuperation-->
                <div v-for="product, id in cart" class="item" v-bind:key="product.id">

                  <div class="img-container">
                    <!-- Affichage de l'image dans le panier -->
                    <img v-bind:src='product.img' />
                  </div>

                  <div class="item-description">
                    <!-- Nom des produits dans le panier -->
                    <h4>{{ product.description }}</h4>
                    <!-- Prix des produits dans le panier -->
                    <p>{{ product.price }}€</p>
                  </div>
                     <!-- Quantité des produits dans le panier -->
                  <div class="item-quantity">
                    <h6>Quantité : {{ product.quantity }}</h6>
                     <!-- Icons dans le panier -->
                    <div class="cart-icons">
                      <!-- methode pour recuperer le produits au click -->
                      <button v-on:click="cartPlusOne(product)">
                        <!-- signe + dans panier -->
                        <i class="fa fa-plus"></i>
                      </button>
                        <!-- Diminution de la quatité de produit dans le panier -->
                      <button v-on:click="cartMinusOne(product, id)">
                          <!-- signe - dans panier -->
                        <i class="fa fa-minus"></i>
                      </button> 
                      <!-- Suppression de l'id au click -->
                      <button @click="cartRemoveItem(id)">
                          <!-- Poubelle dans panier -->
                        <i class="fa fa-trash"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </transition-group>
              <!-- Total du panier -->
              <div class="grand-total">
                <div class="total">
                  <h2>Total</h2>
                  <h2>{{ cartTotalAmount }} €</h2>
                </div>
                <h6>Total articles : {{ itemTotalAmount }}</h6>
              </div>
              <div class="order-button">
                <button>Commander</button>
              </div>
            </div>
          </transition>
        </div>
      </div>
    </script>

    <script src="assets/js/jquery.min.js"></script>
    <!-- lecture du fichier script.js -->
    <script src="./assets/js/script.js"></script>
      <!-- lecture du Framwork VueJs -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
     <!-- lecture du Router -->
    <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
    <!-- Plugins de Cookies Vue Cookies -->
    <script src="https://unpkg.com/vue-cookies@1.5.12/vue-cookies.js"></script>
 <!-- lecture du fichier vue.js -->
    <script src="./assets/js/vue.js" type="text/javascript"></script>
  </body>
</html>
