<template>
<div>
    <textarea  rows="3" id="sulatan" class="form-control " placeholder="Express your thoughts"></textarea>
    <hr />
    <div class="post-tools">
        <ul class="actions">
            <li>
                <font-awesome-icon class="action-buttons" icon="fa-solid fa-user" />
            </li>
            <li>
                <font-awesome-icon class="action-buttons" icon="fa-solid fa-file-image" />                            </li>
          
        </ul>
        <ul class="actions">
         
            <li>
                <button class="btn btn-primary"> <font-awesome-icon icon="fa-solid fa-paper-plane" /> Express</button>
            </li>
        </ul>
    </div>
</div>
</template>
<script lang="ts">
import  { defineComponent } from 'vue';

export default defineComponent({

});
</script>
<style lang="scss">
#sulatan {
   border: 1px solid rgb(241, 241, 241);
    font-size: 20px;   
    color: rgb(56, 56, 56);

}

#sulatan:focus {
    outline: none;
}

.post-tools {
    display: flex;
    justify-content: space-between;
    align-items: center;
    .actions {
        display: flex;
        gap: 16px;
        justify-content: end;
        align-items: flex-end;
        .action-buttons {
            font-size: 1.5rem;
            color: rgb(88, 164, 235);
        }
        li:last-child {
            button {
                border-radius: 50px 50px 50px 50px;
            }
        }
       
    }
}
</style>