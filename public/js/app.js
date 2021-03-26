window.onload = function () {
var app = new Vue({
    el: "#app",
    data: {
        products: [],
        bag: [],
        pagination: {}
    },
    methods: {
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
        }
    },
    watch: {

    },
     mounted: function(){
         this.viewProduct();
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

    }
})
}