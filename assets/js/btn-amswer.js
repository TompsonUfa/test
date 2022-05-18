var btnAnswer = document.querySelectorAll('.btn-amswer');
for (let i = 0; i < btnAnswer.length; i++) {
    btnAnswer[i].addEventListener('click', function () {
        let parent = btnAnswer[i].parentNode;
        let childrenBtn = parent.children;

        if (!parent.classList.contains('several-options')) {
            if (!btnAnswer[i].classList.contains('selected')) {
                for (let s = 0; s < childrenBtn.length; s++) {
                    childrenBtn[s].classList.remove('selected');
                }
                btnAnswer[i].classList.add('selected');
            } else {
                btnAnswer[i].classList.remove('selected');
            }
        } else {
            if (!btnAnswer[i].classList.contains('selected')) {
                btnAnswer[i].classList.add('selected');
            } else {
                btnAnswer[i].classList.remove('selected');
            }
        }
    });
};