\documentclass[11pt,a4paper]{article}
\usepackage[utf8]{inputenc}
\usepackage[french]{babel}
\usepackage[T1]{fontenc}
\usepackage{amsmath}
\usepackage{amsfonts}
\usepackage{amssymb}
\usepackage{lmodern}
\usepackage[left=2cm,right=2cm,top=2cm,bottom=2cm]{geometry}
\begin{document}
\begin{center}
\begin{LARGE}
\textbf{FACTURE}
\end{LARGE}
\end{center}
\begin{center}
\begin{flushleft}
Date: {{$commande->date}} \\
Nom du client : {{$commande->client}}
\end{flushleft}
\vspace{0.5cm}
\begin{tabular}{|p{1.5cm}|p{10cm}|p{1.5cm}|p{3cm}|}
\hline
Quantité & Désignation & Prix Unitaire & Total \\
\hline
@foreach($commande->lignescommandes as $ligne)
\hline
{{$ligne->quantite}}&{{$ligne->produit->libelle}} & {{$ligne->produit->prix}}& {{$ligne->produit->prix}} \\
@endforeach
\multicolumn{2}{|c|}{Somme total} &  \multicolumn{2}{|c|}{- FCFA}\\
\hline
\end{tabular}
\end{center}
\end{document}
