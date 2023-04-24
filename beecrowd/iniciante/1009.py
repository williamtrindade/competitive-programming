nome = input()
salarioFixo = float(input())
totalDeVendas = float(input())

comissao = totalDeVendas * 0.15
totalDevido = salarioFixo + comissao

print('TOTAL = R$ {:.2f}'.format(totalDevido))
