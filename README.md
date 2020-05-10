# OOP-tema1
OOP-tema1

Sa se creeze doua clase:
- una care sa defineasca un numar complex (ex: ComplexNumber): aceasta trebuie sa contina doua atribute private (ex: $real si $imaginary) si metode ajutatoare (ex: __construct, metode tip getter ex: getRealNumber, getImaginaryNumber)
- una care sa actioneze ca un calculator (ex: ComplexCalculator): aceasta clasa trebuie sa primeasca doi parametri de tipul clasei definite la punctul anterior (ex: ComplexNumber) in constructor, doua atribute private in care sa se stocheze cele doua numere complexe (ex: x si y) si patru metode care sa calculeze suma, inmultirea, diferenta si impartirea celor 2 doua numere complexe trimise in constructorul clasei (ex nume functii: sum, multiply, difference, division si module).
Sa se dea cate un exemplu pentru fiecare operatie (suma, diferenta, inmultire, impartire).

Recomandari:
- Clasele ar putea sa fie definite in fisiere diferite si incluse acolo unde sunt folosite (ex nume fisiere: ComplexNumber.php, ComplexCalculator.php, index.php)
- Obiectele rezultate din instantierea clasei numarului complex ar trebui sa fie imutabile (https://ro.wiktionary.org/wiki/imutabil)
- Metodele trebuie foloseasca type hinting si return type declarations (acolo unde este posibil si necesar)
- Metodele pentru calcularea operatiilor trebuie sa intoarca valori care sa fie afisate in fisierul in care se dau exemplele.
- Se pot crea oricate metode/atribute in plus simtiti ca sunt necesare (dar minim cele cerute in enunt)
