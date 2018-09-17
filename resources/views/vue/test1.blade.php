<!DOCTYPE html>
<html>
<head>
    <script src="{{asset('vue/vue.js')}}"></script>
    <title>vue test1</title>
</head>
<body>
    <div id="root">@{{msg}}
        <div v-on:click="handleClick">@{{number}}</div>
        <div v-bind:title="'fuck you ' + title">title_111</div>
        <input v-model="content" />
        <div>@{{ content }}</div>

        计算属性
        姓:<input v-model="firstName" />
        名:<input v-model="lastName" />
        <br />
        姓名:<h3>@{{ fullName }}</h3>
        变换次数:@{{ count }}

        判断
        <br />
        <div v-if="show">v-if:here it is!</div>
        <div v-show="show">v-show:here it is!</div>
        <button v-on:click="handleClick_1">click me</button>

        循环
        <ul>
            <li v-for="(item1,index) of list":key="item1">@{{ item1 }}</li>
        </ul>
        <br />
        <ul>
            <li v-for="(item,index) of list":key="index">@{{ index }}</li>
        </ul>

        todulist
        <br /><br />
        <input v-model="inputValue"/>
        <button v-on:click="handleClick_2">提交</button>
        <ul>
            <li v-for="(item_2,index) of list_2":key="item_2">@{{ item_2 }}</li>
        </ul>
        {{--组件--}}
        <br /><br />
        组件学习：<br />
        <input v-model="inputValue_3"/>
        <button v-on:click="handleClick_3">提交</button>
        <ul>
            <todo-item v-on:click='handleClick' v-on:delete="handleDelete" v-for="(item_3,index) of list_3"
                       :key="index"
                       :content_3="item_3":index="index"

            ></todo-item>
        </ul>

        <ul>
            <li v-on:click="handleClick">哈啊哈</li>
        </ul>

    </div>
    <script>
        //全局组件
        Vue.component('todo-item',{
            props:['content_3','index'],
            template:"<li >--@{{content_3}}--</li>"
        });
      /*  局部组件
        var todoItem = {
            template:"<li>item</li>"
        };*/
        new Vue({
            el:"#root",

       /*     //局部组件声明
            components:{
              'todo-item':todoItem  //若键值一致，则可以省略简写为一个  也就是 { todoItem }
            },
*/
            /*template:'<h1>haha @{{msg}}</h1>',*/
            data:{
                msg:"hello world",
                number:1234,
                title:'title_111',
                content:'content_aaa',
                firstName:'',
                lastName:'',
                count: 0,
                show:true,
                list:[1,44,5],
                inputValue:'',
                inputValue_3:'',
                list_2:[],
                list_3:[]
            },
            methods:{
                handleClick:function(){
                    alert('tt');
                    this.number=5678
                },
                handleClick_1:function(){
                    this.show=!this.show;
                },
                handleClick_2:function(){
                    this.list_2.push(this.inputValue);
                    this.inputValue='';
                },
                handleClick_3:function(){
                    this.list_3.push(this.inputValue_3);
                    this.inputValue_3='';
                },
                handleClick_4:function(){
                    alert(this.index);
                    this.$emit('delete',this.index);
                },
                handleDelete:function(){
                    this.list_3.splice(index,1)
                }
            },
            computed:{
                fullName:function(){
                    return this.firstName+' '+this.lastName;
                }
            },
            watch:{
                fullName:function(){
                    this.count++;
                }
            }
        })
    </script>
</body>
</html>
