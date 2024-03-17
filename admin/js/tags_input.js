const ul = document.getElementById("list_tags"),
input = document.getElementById("tags_input"),
tagNumb = document.querySelector(".details span");

let maxTags = 10,
tags = [];



countTags();
createTag();

function countTags(){
    input.focus();
    tagNumb.innerText = maxTags - tags.length;
}

function createTag(){
    ul.querySelectorAll("li").forEach(li => li.remove());
    tags.slice().reverse().forEach(tag =>{
        let liTag = `<li>${tag} <i class="fas fa-times-circle" onclick="remove(this, '${tag}')"></i></li>`;
        ul.insertAdjacentHTML("afterbegin", liTag);
    });
    countTags();
}

function remove(element, tag){
    let index  = tags.indexOf(tag);
    tags = [...tags.slice(0, index), ...tags.slice(index + 1)];
    element.parentElement.remove();
    countTags();
    $('#all_tags_input').val(tags)
}

function addTag(e){
    if(e.key == "Enter"){
        let tag = e.target.value.replace(/\s+/g, ' ');
      
        if(tag.length > 1 && !tags.includes(tag)){
            if(tags.length < 10){
                tag.split(',').forEach(tag => {
                    tags.push(tag);
                    createTag();
                });
            }
        }
        e.target.value = "";
        console.log(tags)
        $('#all_tags_input').val(tags)
    }
}

input.addEventListener("keyup", addTag);




$('#remove_tags').click(function(e){
e.preventDefault();
tags.length = 0;
ul.querySelectorAll("li").forEach(li => li.remove());
countTags();
})
