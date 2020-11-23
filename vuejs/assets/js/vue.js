// data base de donées Acrticles
const products = [
  { id: 1, description: "kenzo homme", price: 159, img: 'assets/img/lunette1.JPG'},
  { id: 2, description: 'Prada femme', price: 189, img: 'assets/img/lunette2.JPG'},
  { id: 3, description: 'Ray-Ban homme', price: 115, img: 'assets/img/lunette3.JPG'},
  { id: 4, description: 'Ray-ban homme', price: 129, img: 'assets/img/lunette4.JPG'},
  { id: 5, description: 'Prada femme', price: 229, img: 'assets/img/lunette5.JPG'},
  { id: 6, description: 'Carrera homme', price: 109, img: 'assets/img/lunette6.JPG'},
  { id: 7, description: 'Kenzo femme', price: 179, img: 'assets/img/lunette7.JPG'},
  { id: 8, description: 'Kenzo homme', price: 209, img: 'assets/img/lunette8.JPG'},
  { id: 9, description: 'Carrera homme', price: 129, img: 'assets/img/lunette9.JPG'},
  { id: 10, description: 'Ray-ban homme', price: 149, img: 'assets/img/lunette10.JPG'},
  { id: 11, description: 'Prada homme', price: 155, img: 'assets/img/lunette11.JPG'},
  { id: 12, description: 'Ray-Ban femme', price: 129, img: 'assets/img/lunette12.JPG'},
  { id: 13, description: 'Carrera homme', price: 119, img: 'assets/img/lunette13.JPG'},
  { id: 14, description: 'Ray-ban femme', price: 129, img: 'assets/img/lunette14.JPG'},
  { id: 15, description: 'Prada homme', price: 169, img: 'assets/img/lunette15.JPG'},
  { id: 16, description: 'Carrera homme', price: 129, img: 'assets/img/lunette16.JPG'},
  { id: 17, description: 'Kenzo femme', price: 199, img: 'assets/img/lunette17.JPG'},
  { id: 18, description: 'Ray-ban homme', price: 145, img: 'assets/img/lunette18.JPG'},
  { id: 19, description: 'kenzo femme', price: 165, img: 'assets/img/lunette19.JPG'},
  { id: 20, description: 'Ray-Ban homme', price: 139, img: 'assets/img/lunette20.JPG'},
];

const Home = {  //component de notre page d'acceuil
  template: '#home',  //endroit on sera ecrit le texte de notre page
  name: 'Home', //Nom pour l'identifier
  data: () => { 
    return { //retour la base de donées
      products, //on passe la variable products dans la data products
      searchKey: '', //recuperation de la recherche utilisateur
      liked: [], //recuperation des elements que l'utilisateur a liker
      cart: [] //recuperation des produit pour le oanier
    }
  },
  computed: { //l'endroit ou on place nos methodes
    filteredList(){ // fonction pour filtrer la liste d'elements
      return this.products.filter((product) => { // on compare chaque produit a ce dans le search imput
        return product.description.toLowerCase().includes(this.searchKey.toLowerCase()); //recuperation e la description meeme en Majuscule
      })
    },
    getLikeCookie(){ //mettre a jour la liste des cookies dans like
      let cookieValue = JSON.parse($cookies.get('like')); // recuperation des likes ds cookiesvualue
      cookieValue == null ? this.liked = [] : this.liked = cookieValue // si c'est vide ne rien mettre, sinon..
    },
    cartTotalAmount(){//montant total du panier
      let total = 0;//total est de 0
      for (let item in this.cart){  //boucle /Stock 
        total = total + (this.cart[item].quantity * this.cart[item].price)//on reprend le total de atem on rajoute la quantie de item puis le prix de item
      }
      return total;
    },
    itemTotalAmount(){//montant total des articles du panier
      let itemTotal = 0;//total est de 0
      for (let item in this.cart){ //boucle /Stock
        itemTotal = itemTotal + (this.cart[item].quantity); //on reprend le total actuel est on rajouer la quantité 
      }
      return itemTotal;
    }
  },
  methods: { 
    setLikeCookie(){ //Declencher au monment de click sur le checkbox
      document.addEventListener('input', () => {
        setTimeout(() => {// gesyion du temp pour le cookies
          $cookies.set('like', JSON.stringify(this.liked));// mettre en place dans les cookies de l'utilisateur
        }, 300);
      })
    },
    addToCart(product){ // check si le produit est bien dans array pour eviter les doublons
      for (let i = 0; i < this.cart.length; i++){ //boucle for
        if (this.cart[i].id === product.id) {//si l'id est present dans le panier
          return this.cart[i].quantity++ // S'il le trouve il rajoute une quantité
        }
      }
      this.cart.push({ //les informations recuperer dans le panier 
        id: product.id, //le produit
        img: product.img,//l'image du produit
        description: product.description,//description du produit
        price: product.price, //le ptix du produits
        quantity: 1 // la quantiter, on rajour 1 a chaque clique
      })
    },
    cartPlusOne(product){//recuperation du produit dans aray cart (panier), rajout un produit a chaque click
      product.quantity = product.quantity + 1;
    },
    cartMinusOne(product, id){//recuperation du produit dans aray cart (panier), Suppression d'une quantié d'un produit a chaque click
      if (product.quantity == 1) {//si il ya qu'un seul produit, tu supprime le produit
        this.cartRemoveItem(id);//suppression
      } else {//sinon
        product.quantity = product.quantity -1;//tu enleve un article
      }
    },
    cartRemoveItem(id){//Suppression d'un produit dans le panier
      this.$delete(this.cart, id) //suppression dans cart d'un id
    }
  },
  mounted: () => { // A chaque lancement de page tu recupere les like de l'utilisateur
    this.getLikeCookie;
  }
}
const UserSettings = {  //component de notre page d'identification
  template: '<h1>User Settings</h1>',  //endroit on sera ecrit le texte de notre page
  name: 'UserSettings' //Nom pour l'identifier
}
const WishList = {  //component de notre page des articles q'on aime
  template: '<h1>Wish List</h1>',  //endroit on sera ecrit le texte de notre page
  name: 'WishList' //Nom pour l'identifier
}
const ShoppingCart = { //component de notre page panier
  template: '<h1>Shopping Cart</h1>', //endroit on sera ecrit le texte de notre page
  name: 'ShoppingCart' //Nom pour l'identifier
}

// router
const router = new VueRouter({//nouvelle instance de classe du Router
  routes: [ //path est le chemin qui sera ecrit sur la bare d'Url
    { path: '/', component: Home, name: 'Home' },
    { path: '/user-settings', component: UserSettings, name : 'UserSettings' },
    { path: '/wish-list', component: WishList, name: 'WishList' },
    { path: '/shopping-cart', component: ShoppingCart, name: 'ShoppingCart' },
  ]
})

const vue = new Vue({
  router
}).$mount('#app');
