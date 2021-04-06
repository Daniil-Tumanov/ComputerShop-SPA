window.onload = function () {
var app = new Vue({
    el: "#app",
    data: {
        products: [],
        bag: [],
        sum: 0,
        pagination: {},
        carts: [],
        cartadd: {
            id: '',
            IMG: '',
            name: '',
            description: '',
            price: '',
            specifications: ''
        },
        badge: '0',
        quantity: '1',
        totalprice: '0',
        search: '',
        minPrice: 0,
        maxPrice: 100000,
        selected: 'Все',
        sortedProducts: [],
        categories: [
            {name: 'Все', value: '1'},
            {name: 'Процессоры', value: '2'},
            {name: 'Видеокарты', value: '3'},
            {name: 'Материнские платы', value: '4'},
            {name: 'Оперативная память', value: '5'},
            {name: 'Блоки питания', value: '6'},
            {name: 'Корпуса', value: '7'},
            {name: 'Накопители', value: '8'},
          ],
          sortBy: null,
    },
    methods: {
        searchProduct(){
            fetch('/api/products/search?q='+this.search)
            .then(res => res.json())
            .then(res => {
                this.caris = res;
                this.search = '';
                this.showsearch = true;
            })
            .catch(err => {
                console.log(err);
            });
        },
        viewCart(){
            if(localStorage.getItem('carts')){
                this.carts = JSON.parse(localStorage.getItem('carts'));
                this.badge = this.carts.length;
                this.totalprice = this.carts.reduce((total, item)=>{
                    return total + item.amount * item.price;
                }, 0);
            }
        },
        addCart(pro){
            this.cartadd.id = pro.ID;
            this.cartadd.IMG = pro.IMG;
            this.cartadd.name = pro.Name;
            this.cartadd.description = pro.Description;
            this.cartadd.price = pro.Price;
            this.cartadd.specifications = pro.Specifications;
            this.cartadd.amount = this.quantity;
            this.carts.push(this.cartadd);
            this.cartadd = {};
            this.storeCart();
            console.log(pro);
            alert('Товар добавлен в корзину');
        },
        removeCart(pro){
            this.carts.splice(pro, 1);
            this.storeCart();
        },
        storeCart(){
            let parsed = JSON.stringify(this.carts);
            localStorage.setItem('carts', parsed);
            this.viewCart();
        },
        viewProduct(pagi){
            pagi = pagi || '/api/products';
            let self = this;
            axios
            .get(pagi)
            .then(response => {
                self.products = response.data.data;
                self.pagination = {
                    current_page: response.data.current_page,
                    last_page: response.data.last_page,
                    from_page: response.data.from,
                    to_page: response.data.to,
                    total_page: response.data.total,
                    path_page: response.data.path+"?page=",
                    first_link: response.data.first_page_url,
                    last_link: response.data.last_page_url,
                    prev_link: response.data.prev_page_url,
                    next_link: response.data.next_page_url
                };
                console.log(self.products)
                console.log(self.pagination)
            });
        },
        
        setRangeSlider() {
            if (this.minPrice > this.maxPrice) {
              let tmp = this.maxPrice;
              this.maxPrice = this.minPrice;
              this.minPrice = tmp;
            }
            this.sortByCategories()
          },
          sortByCategories(category) {
            let self = this;
            
            this.sortedProducts = this.products
            this.sortedProducts = this.sortedProducts.filter(function (item) {
              return item.Price >= self.minPrice && item.Price <= self.maxPrice
            })
            if (category) {
              this.sortedProducts = this.sortedProducts.filter(function (e) {
                self.selected === category.name;
                return e.IdCategory === category.value
              })
            }
            
          },
          sortProduct() {
            if (this.sortType == 'price') {
                this.products = this.products.sort((prev, curr) => prev.Price - curr.Price);
            }
          }
    //     addToBag: function(ID){
    //         let self = this;
    //         let founded = self.bag.find(product => product.id == ID);
    //         if(!founded){
    //             this.bag.push({id: ID, quantity: 1});
    //         }
    //         else{
    //             founded.quantity++;
    //         }
    //         self.sum = 0;
    //         for(var productInBag of self.bag){
    //             console.log(productInBag);
    //             let foundedProduct = self.products.find(products => products.id == productInBag.id);
    //             console.log(self.bag);
    //             self.sum += foundedProduct.Price * productInBag.quantity;
    //         }
    //         console.log(this.bag);
    //     }
     },
    watch: {

    },
     mounted: function(){
         this.viewProduct();
         this.viewCart();
    },
    computed:{
        filterProducts(){
            if(this.sortBy === 'default'){
                return this.products.sort((prev, curr) => {
                    console.log(prev.ID);
                  return prev.ID > curr.ID ? 1 : -1;
              });
            }
            if (this.sortBy === 'by-name') {
                return this.products.sort((prev, curr) => {
                    console.log(prev.Name);
                  return prev.Name > curr.Name ? 1 : -1;
              });
            }
            if (this.sortBy === 'by-price') {
                return this.products.sort((prev, curr) => {
                    console.log(prev.Price);
                  return prev.Price - curr.Price;
              });
            }
           
            console.log(this.search)
            if(this.search.length){
            return this.products.filter(product => {
                return product.Name.toLowerCase().includes(this.search.toLowerCase()) || product.Description.toLowerCase().includes(this.search.toLowerCase());
            })
        }

            if (this.sortedProducts.length) {
                return this.sortedProducts
            }
            else{
                return this.products
            }
        },
        
    //     filteredProducts() {
    //     if (this.sortedProducts.length) {
    //       return this.sortedProducts
    //     } else {
    //       return this.PRODUCTS
    //     }
    //   },
        

    }
})
}
// var sortByPrice = function (d1, d2) { return (d1.price > d2.price) ? 1 : -1; };
