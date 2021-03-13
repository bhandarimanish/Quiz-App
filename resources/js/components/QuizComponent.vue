<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Online Examination
                    <span class="float-right">{{questionIndex}}/{{questions.length}}</span>
                    </div>
                    <div class="card-body">
                    <span style="float:right;color:red">{{clock}}</span>
                    <div v-for="(question,index) in questions" style="margin-left:10px">
                    <div v-show="index==questionIndex">
                    {{question.name}}
                    <ol>
                    <li v-for="choice in question.answers">
                    <label>
                        <input type="radio"
                        :value="choice.is_correct==true?true:choice.answer"
                        :name="index"
                        v-model="userresponses[index]"
                        @click="choices(question.id,choice.id)"  
                        >
                        {{choice.answer}}
                    </label>
                    </li>
                    </ol>
                    </div>
                    </div>
                    <div v-show="questionIndex!=questions.length">
                    <button class="btn btn-success float-right"@click="next();postuserChoice()">Next</button>
                    <button v-if="questionIndex>0" class="btn btn-success "@click="prev()">Prev</button>
                    </div>
                    
                    <div v-show="questionIndex===questions.length">
                     <center>
                    <p>
                    You have got:<br>{{score()}}/{{questions.length}}
                    </p>
                    <a href="/home" class="btn btn-primary">Back to Home</a>
                       </center>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['quizid','quizQuestions','hasQuizPlayed','times'],
        data()
        {
            return{
                    questions:this.quizQuestions,
                    questionIndex:0,
                    userresponses:Array(this.quizQuestions.length).fill(false),
                    currentQuestion:0,
                    currentAnswer:0,
                    //clock:moment(this.times*60 *1000)
                  clock:this.times
            }
        },
        mounted() {
            setInterval(() => {
                this.clock = moment(this.clock.subtract(1,'seconds'))
            },1000);
            
        },
        computed:{
            time:function(){
                var minsec=this.clock.format('mm:ss');
                if(minsec=='00:00')
                {
                    alert("Timeout")
                    window.location.reload();
                }
                return minsec
            }
        },
        methods:{
            next()
            {
                this.questionIndex++
            },
            
            prev()
            {
                this.questionIndex--
            },
            choices(question,answer){
                this.currentAnswer=answer,
                this.currentQuestion=question
            },
            score()
            {
                return this.userresponses.filter((val)=>{
                    return val===true;
                }).length
            },
            postuserChoice()
            {
                axios.post('/quiz/create',{
                    answerId:this.currentAnswer,
                    questionId:this.currentQuestion,
                    quizId:this.quizid
                }).then((response)=>{
                    console.log(response)
                }).catch((error)=>{
                    alert("Error!")
                })
            }
        }
    }
</script>
