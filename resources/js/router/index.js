import InfiniteScroll from '../components/InfiniteScrollComponent.vue'
import Search from '../components/SearchComponent.vue'
import Datatable from '../components/DatatableComponent.vue'
import PasswordChecker from '../components/PasswordCheckerComponent.vue'
import IsTyping from '../components/IsTypingComponent.vue'
import blog from '../components/BlogDataTableComponent.vue'

export default {
    mode: 'history',
    routes: [
        {
            path: '/infinite-scroll',
            name: 'infinite-scroll',
            component: InfiniteScroll,
        },
        {
            path: '/search',
            name: 'search',
            component: Search,
        },
        {
            path: '/datatable',
            name: 'datatable',
            component: Datatable,
        },
        {
            path : '/password-checker',
            name : 'password-checker',
            component : PasswordChecker
        },
        {
            path : '/is-typing',
            name : 'is-typing',
            component : IsTyping
        },
        {
            path: '/blog-datatabel',
            name : 'blog-datatabel',
            component : blog
        }
    ]
}

