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
            specifications: '',
            amount: ''
        },
        badge: '0',
        quantity: '1',
        totalprice: '0',
        search: ''
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
            // if (this.carts.id == pro.ID){
            //     this.quantity++;
            // }
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
            console.log(pro)
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
    //     pagi = pagi || '/api/products';
    //     let self = this;
    //     axios
    //     .get(pagi)
    //     .then(response => {
    //         self.products = response.data;
    //         self.pagination = {
    //             currentPage: response.meta.currentPage,
    //             lastPage: response.meta.lastPage,
    //             fromPage: response.meta.fromPage,
    //             toPage: response.meta.toPage,
    //             totalPage: response.meta.totalPage,
    //             pathPage: response.meta.pathPage+"?page=",
    //             firstLink = response.links.first,
    //             lastLink = response.links.prev,
    //             nextLink = response.links.next
    //         }
    //         console.log(self.products)
    //     });
    },
    computed:{
        filterProducts(){
            console.log(this.search)
            return this.products.filter(product => {
                return product.Name.toLowerCase().includes(this.search.toLowerCase()) || product.Description.toLowerCase().includes(this.search.toLowerCase());
            })
        }

    }
})
}