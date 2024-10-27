<?php require_once "../blocks/head.php"?>
<?php require_once "../blocks/header.php"?>
<?php require_once "../../connect.php";?>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        h1 {
            color: #2c3e50;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .faq {
            margin-top: 20px;
        }
        .faq-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            overflow: hidden;
        }
        .faq-question {
            background-color: #3498db;
            color: white;
            padding: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .faq-question:hover {
            background-color: #2980b9;
        }
        .faq-answer {
            padding: 15px;
            background-color: #ecf0f1;
            display: none;
        }
    </style>
<?php  $arr = select_all('FAQ'); ?>
    <div class="container">
        <h1>О нас</h1>
        <p>Мы - команда, стремящаяся предоставить лучшие решения для наших клиентов.</p>
        <div class="faq">
            <h2>Часто задаваемые вопросы</h2>
            <?php foreach ($arr as $elem) {?>
            <div class="faq-item">
                <div class="faq-question" onclick="toggleAnswer(this)"><?php echo $elem['Question']?></div>
                <div class="faq-answer"><?php echo $elem['Answer']?></div>
            </div>
            <?php }?>
        </div>
    </div>

    <script>
        function toggleAnswer(questionElement) {
            const answerElement = questionElement.nextElementSibling;
            const isVisible = answerElement.style.display === 'block';
            answerElement.style.display = isVisible ? 'none' : 'block';
        }

        // Скрываем все ответы при загрузке страницы
        document.querySelectorAll('.faq-answer').forEach(answer => {
            answer.style.display = 'none';
        });
    </script>
<?php require_once "../blocks/footer.php"?>